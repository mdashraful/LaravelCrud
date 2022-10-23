<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index(){
        $teachers= Teacher::all();
       
        return view('crud.teacher.index', ['teachers'=> $teachers]);
    }

    public function create(){
        return view('crud.teacher.add');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:128|regex:([\D+])',
            'uniqueId' => 'required|unique:teachers,unique_id|max:16',
            'contact' => 'required|max:16',
            'gender' => 'required|max:11'
        ]);

        $teacher = new Teacher;

        $teacher->name = $request->name;
        $teacher->unique_id = $request->uniqueId;
        $teacher->contact = $request->contact;
        $teacher->gender = $request->gender;

        $teacher->save();

        return to_route('teacher.index');
    }

    public function show($id){
        $teacher = Teacher::find($id);

        return view('crud.teacher.show', compact('teacher'));
    }

    public function edit($id){
        // $id = $request->id;
        $teacher = Teacher::find($id);

        return view('crud.teacher.edit', compact('teacher'));
    }

    public function update(Request $request){
        $id = $request->id;
        $validated = $request->validate([
            'name' => 'required|max:128|regex:[\D+]',
            'uniqueId' => 'required|max:16|unique:teachers,unique_id,' .$id,
            'contact' => 'required|max:16',
            'gender' => 'required|max:11'
        ]);

        $teacher = Teacher::find($id);
        
        $teacher->name = $request->name;
        $teacher->unique_id = $request->uniqueId;
        $teacher->contact = $request->contact;
        $teacher->gender = $request->gender;

        $teacher->update();

        return to_route('teacher.index');
    }

    public function destroy($id){
        Teacher::destroy($id);

        return to_route('teacher.index');
    }
}

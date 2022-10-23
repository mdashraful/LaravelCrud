<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        $students = DB::table('students')->get();
        
        return view('crud.student.index', compact('students'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:128|regex:[\D+]',
            'uniqueId' => 'required|max:16|unique:students,unique_id',
            'contact' => 'required|max:16',
            'gender' => 'required|max:11'
        ]);
        $student = $request->all();
        DB::insert('insert into students (name, unique_id, gender, contact) value (?, ?, ?, ?)', [
            $student['name'], $student['uniqueId'], $student['gender'], $student['contact']
        ]);

        return to_route('student.index');
    }

    public function show(Request $request){
        $stId = $request->id;
        
        $student = DB::table('students')->find($stId);

        return view('crud.student.view', ['student' => $student]);
    }

    public function edit($id){
        // $stId = $request->id;
        
        $student = DB::table('students')->find($id);

        return view('crud.student.edit', ['student' => $student]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:128|regex:[\D+]',
            'uniqueId' => 'required|max:16|unique:students,unique_id,' .$id,
            'contact' => 'required|max:16',
            'gender' => 'required|max:11'
        ]);

        $name = $request->name;
        $gender = $request->gender;
        $contact = $request->contact;
        $uniqueId = $request->uniqueId;

        DB::update("update students set name = '$name', gender='$gender', unique_id='$uniqueId', contact='$contact' where id = ?", ["$id"]);

        return to_route('student.index');
    }

    public function destroy($id){
        DB::table('students')->delete($id);

        return to_route('student.index');
    }
}

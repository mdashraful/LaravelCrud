<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Validation\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCustomer = Customer::orderBy('id','desc')->get();

        return view('crud.customer.index', ['customers'=>$allCustomer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|regex:([\D+])',
            'email' => 'required|max:255|email|unique:customers,email',
            'contact' => 'required|max:16|regex:[\d+]',
            'gender' => 'required|max:16',
        ]);
        Customer::create($validated);

        return redirect()->route('customer.index')->with("success", "New Customer Added Successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('crud.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);

        return view('crud.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $validated = $request->validate([
            'name' => 'required|max:255|regex:([\D+])',
            'email' => 'required|max:255|email:rfc,dns|unique:customers,email,' .$id,
            'contact' => 'required|max:16|regex:[\d+]',
            'gender' => 'required|max:16',
        ]);

        $customer->update($validated);

        return back()->with('success', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);

        return back()->with('success', 'Deleted Successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('employees.index', [
            'employees' => Employee::latest()->filter(request(['search']))->paginate(10)
        ]);

        // return view('employees.index', [
        //     'employees' => Employee::all()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:employees'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:12', 'min:10'],
            'gender' => 'required',
            'position' => 'required',
            'age' => 'required',
            'address' => 'required'
        ]); 

        Employee::create($formFields);

        return redirect('/employee')->with('message', 'Employee ' . $formFields['name'] . ' created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        return view('employees.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:12', 'min:10'],
            'gender' => 'required',
            'position' => 'required',
            'age' => 'required',
            'address' => 'required'
        ]);

        $employee->update($formFields);

        return redirect('/employee')->with('message', 'Employee ' . $formFields['name'] . ' updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return redirect('/employee')->with('message', 'Employee ' . $employee['name'] . ' deleted successfully!');  
    }
}

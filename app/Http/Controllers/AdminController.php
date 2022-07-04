<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('admins.index', [
        //     'admins' => Admin::all()
        // ]);
        return view('admins.index', [
            'admins' => Admin::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.create');
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
            'email' => ['required', 'email', 'unique:admins'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:12', 'min:10']
        ]); 

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'admin_type_id' => 2,
            'password' => $request->password,
            'phone' => $request->phone,
        ]);

        // Admin::create($formFields);

        return redirect('/admin')->with('message', 'Admin ' . $formFields['name'] . ' created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
        return view('admins.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:12', 'min:10']
        ]); 

        $admin->update($formFields);

        return redirect('/admin')->with('message', 'Admin ' . $formFields['name'] . ' updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
        $admin->delete();
        return redirect('/admin')->with('message', 'Admin ' . $admin['name'] . ' deleted successfully!');        
    }
}

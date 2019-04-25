<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Admin;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins = DB::table('Admin')
            ->where('admin_username', 'LIKE', '%' . $request->get('admin_username') . '%')
            ->orWhere('admin_name', 'LIKE', '%' . $request->get('admin_name') . '%')
            ->get(); 

        return view('admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request->validate([
            'admin_username'=>'required|string',
            'admin_name'=> 'required|string',
            'password' => 'required|string'
        ]);
        $admin = new Admin([
            'admin_username' => $request->get('admin_username'),
            'admin_name'=> $request->get('admin_name'),
            'password'=> $request->get('password')
        ]);
        $admin->save();
        return redirect('/admins')->with('success', 'New admin has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);

        return view('admins.edit', compact('admin'));
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
        $request->validate([
            'admin_name'=>'required|string',
            'admin_username'=> 'required|string'
        ]);

        $admin = Admin::find($id);
        $admin->admin_name = $request->get('admin_name');
        $admin->admin_username = $request->get('admin_username');
        $admin->save();

        return redirect('/admins')->with('success', $request->get('admin_username').' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return redirect('/admins')->with('success', $id.' has been deleted');
    }
}

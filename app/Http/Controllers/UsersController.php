<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = DB::table('User')
            ->get(); 

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'user_email'=>'required|string',
            'user_name'=> 'required|string',
            'password' => 'required|string'
        ]);
        $enabled = 1;
        $account_url = preg_replace('/\s/', '', $request->get('user_name'));
        $account_img = "undefined";
        $header_img = "undefined";
        $user = new User([
            'user_email' => $request->get('user_email'),
            'user_name'=> $request->get('user_name'),
            'password'=> $request->get('password'),
            'account_url'=> $account_url,
            'account_img'=> $account_img,
            'header_img'=> $header_img,
            'is_enabled'=> $enabled,
        ]);
        $user->save();
        return redirect('/users')->with('success', 'Stock has been added');
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
        $users = User::find($id);

        $user = DB::table('User')
            ->where('user_email', $id)
            ->first();

        return view('users.edit', compact('user'));
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
            'user_name'=>'required|string',
            'user_email'=> 'required|string'
        ]);

        $user = User::find($id);
        $user->user_name = $request->get('user_name');
        $user->user_email = $request->get('user_email');
        $user->is_enabled = $request->get('is_enabled');
        $user->save();

        return redirect('/users')->with('success', $request->get('user_email').' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/users')->with('success', $id.' has been deleted');
    }
}

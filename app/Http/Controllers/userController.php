<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Users::all();
        return [
            "mssg" => "Done",
            "data" => $user
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'password' => 'required'
        ]);
        $user = Users::create($request->all());
        return [
            "mssg" => "Done",
            "data" => $user
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Users $user)
    {
        return [
            "mssg" => "Done",
            "data" =>$user
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $user)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
 
        $user->update($request->all());
 
        return [
            "status" => 1,
            "data" => $user,
            "mssg" => "User updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user)
    {
        $user->delete();
        return [
            "status" => 1,
            "data" => $user,
            "mssg" => "User deleted successfully"
        ];
    }
}

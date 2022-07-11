<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return users::all();
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
        //

        //
        $db = new users();
        $db->id=$request->id;
        $db->full_name=$request->full_name;
        $db->users_name=$request->users_name;
        $db->email=$request->email;
        $db->password=$request->password;
        $db->phone=$request->phone;
        $db->address=$request->address;
        $db->remember_token=$request->remember_token;
        $db->created_at=$request->created_at;
        $db->updated_at=$request->updated_at;
        // $db=$request->all();
        // $db->id = $id;
       
        $db->save();
        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return users::findOrFail($id);

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
    public function update(Request $request, $id)
    {
        

        $db = users::findOrFail($id);
        // $db=$request->all();
        // $db->id = $id;
        $db->id=$request->id;
        $db->full_name=$request->full_name;
        $db->users_name=$request->users_name;
        $db->email=$request->email;
        $db->password=$request->password;
        $db->phone=$request->phone;
        $db->address=$request->address;
        $db->remember_token=$request->remember_token;
        $db->created_at=$request->created_at;
        $db->updated_at=$request->updated_at;
        $db->save();
        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
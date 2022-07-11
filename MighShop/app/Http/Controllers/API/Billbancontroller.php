<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\billban;
use App\Models\billdetailban;
use \Datetime;
class Billbancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return billban::all();
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
        $db = new billban();
        // $db->id_kh = $request->id_kh;
        $db->ten_kh = $request->ten_kh;
        $db->sdt = $request->sdt;
        $db->dc_giaohang = $request->dc_giaohang;
        $db->date_order =new Datetime();
        $db->tong_tien = $request->tong_tien;
        $db->payment = $request->payment;
        
        $db->note = $request->note;
        $db->created_at = new Datetime();
        $db->updated_at = new Datetime();
        $db->save();


        $chitiet=$request->billdetailban;
        foreach($chitiet as $ct){
            $a=new billdetailban();
            $a->id_bill_ban=$db->id;
            $a->id_sp=$ct['id_sp'];
            $a->sl=$ct['sl'];
            $a->unit_price=$ct['unit_price'];

            $a->save();
        }
        
        return $db;
        // echo.log($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return billban::findOrFail($id);
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
        $db = billban::findOrFail($id);
        // $db=$request->all();
        // $db->id = $id;
        $db->id_sp = $request->id_sp;
        $db->ten_kh = $request->ten_kh;
        $db->email_kh = $request->email_kh;
        $db->sdt = $request->sdt;
        $db->dc_giaohang = $request->dc_giaohang;
        $db->date_order = $request->date_order;
        $db->tong_tien = $request->tong_tien;
        $db->payment = $request->payment;
        $db->note = $request->note;
        $db->created_at = new Datetime();
        $db->updated_at = new Datetime();
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
        billban::findOrFail($id)->delete();
        return "Deleted";
    }
}
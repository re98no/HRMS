<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin_panel_setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admin_panel_settingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Show all data
        $com_code = auth()->user()->com_code;
        $data = admin_panel_setting::select('*')->where('com_code' , $com_code)->get();

    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin_panel_setting $admin_panel_setting)
    {
        //
    }

    
}

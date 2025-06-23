<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Management;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Management $management)
    {
        // $management = Management::all();
        // dd($management);
        return view('pages.admin.index');
    }
}

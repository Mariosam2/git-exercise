<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function destroy()
    {
        for ($i = 0; $i < 50; $i++) {
        }
        return view();
    }
}

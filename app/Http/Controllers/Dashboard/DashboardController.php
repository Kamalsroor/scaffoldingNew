<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // test comment
        return view('dashboard.home');
    }
}

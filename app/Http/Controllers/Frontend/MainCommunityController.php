<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainCommunityCOntroller extends Controller
{
    //object for turning on the maintenance mode
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    //index function for the main community page

    public function index()
    {
        return view(theme('pages.main_community'));
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        return view('users.about', [ 'countries'=>Country::all()]);
    }
}

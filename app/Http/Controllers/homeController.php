<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function index()
    {
        $doctor = Doctor::all();
        return view('user.home', compact('doctor'));
    }

    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->User_Type == '0') {
                return view('user.home');
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\appoinment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function index()
    {
        $doctor = Doctor::all();
        return view('user.home', compact('doctor'));
    }

    public function appointment(Request $request)
    {
        $data = new appointment;
        $data-> name= $request->name;
        $data-> email= $request->email;
        $data-> date= $request->date;
        $data-> phone= $request->phone;
        $data-> message= $request->message;
        $data-> doctor= $request->doctor;
        $data-> status= 'In Progress';

        if(Auth::id())
        {
            $data-> user_id= Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','Appointment Request Successfull. We will Call for Confirmation');
    }

    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->User_Type == '0') {
                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));
                
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function myappointment()
    {
        if (Auth::id()) 
        {
            $userid = Auth::user()->id;

            $appoint = appointment::where('user_id', $userid)->get();

            return view('user.my_appointment', compact('appoint'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function cancle_appointment($id)
    {
    $data = appointment::find($id);
    $data->delete();
    
    return redirect()->back()->with('message','Your Appointment Request Cancle');

    }
}

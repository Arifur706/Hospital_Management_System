<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function Doctor_info(Request $request)
    {
        $doctor = new doctor;

        $image = $request->image;

        $imagename = time().'.'.$image->getClientoriginalExtension();
        $request->image->move('doctor_image', $imagename);
        $doctor->image = $imagename;

        $doctor->name = $request->name;
        $doctor->contact = $request->phone;
        $doctor->department= $request->department;
        $doctor->room = $request->room;
        $doctor->save();
        return redirect()->back()->with('messege', 'Doctor Added Succesfully to Database');

}
}
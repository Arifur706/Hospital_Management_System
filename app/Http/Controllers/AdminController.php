<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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
public function showappointment()
{
    $data = appointment::all();
    return view('admin.showappointment', compact('data'));
}

public function approve_appointment($id)
{
    $data = appointment::find($id);
    $data->status = 'approved';

    $data->save();

    return redirect()->back();
}

public function cancle_appointment($id)
{
    $data = appointment::find($id);
    $data->status = 'cancled';

    $data->save();

    return redirect()->back();
}

public function showdoctor()
{
    $data = Doctor::all();
    
    return view('admin.showdoctor', compact('data'));
}

public function delete_doctor($id)
{
    $data = doctor::find($id);
    $data->delete();

    return redirect()->back()->with('messege','Doctor Delete from Database');
}

public function update_doctor($id)
{
    $data = doctor::find($id);
    return view('admin.update_doctor', compact('data'));
}

public function edit_doctor(Request $request, $id)
{
    $data = doctor::find($id);

        $image = $request->image;
        if($image)
        {
        $imagename = time().'.'.$image->getClientoriginalExtension();
        $request->image->move('doctor_image', $imagename);
        $data->image = $imagename;
        }

        $data->name = $request->name;
        $data->contact = $request->phone;
        $data->department= $request->department;
        $data->room = $request->room;
        $data->save();
        return redirect()->back()->with('messege', 'Doctor Information Updated');
}


}
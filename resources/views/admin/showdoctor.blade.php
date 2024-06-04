<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body style="height: 100%;">
    <div class="container-scroller">
 @include('admin.sidebar')
    
@include('admin.navbar')

<div class="container-fluid page-body-wrapper mt-5">

    <div style="width: 100%; margin: 0;  align-items: center;">

    @if(session()->has('messege'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('messege')}}
                </div>
                @endif

        <table style="margin-left: auto; margin-right: auto; border: 1px solid; border-collapse: collapse;">
            <tr style="background-color: blue; border: 1px solid;">
                <th style="padding: 10px; font-size: 20px; color: white;">Doctor Name</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Number</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Department</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Room</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Image</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Delete</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Update</th>
            </tr>
            @foreach ($data as $doctors)
            <tr>
                <td style="padding: 10px; ">{{$doctors->name}}</td>
                <td style="padding: 10px;">{{$doctors->contact}}</td>
                <td style="padding: 10px;">{{$doctors->department}}</td>
                <td style="padding: 10px;">{{$doctors->room}}</td>
                <td style="padding: 10px; "><img src="doctor_image/{{$doctors->image}}" height = "30px"width= "30px"alt=""></td>
                <td style="padding: 10px;">
                    <a class="btn btn-danger" style="color: white; padding: 5px 10px; text-decoration: none;" onclick="return confirm('Are you sure to delete this?')" href="{{url('delete_doctor', $doctors->id)}}">Delete</a>
                </td>
                <td style="padding: 10px;">
                    <a class="btn btn-primary" style="color: white; padding: 5px 10px; text-decoration: none;" href="{{url('update_doctor', $doctors->id)}}">Update</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>




    @include('admin.script')
  </body>
</html>
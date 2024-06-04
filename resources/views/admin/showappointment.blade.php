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


    <div style="width: 100%; margin: 0; display: flex; align-items: center;">
        <table style="margin-left: auto; margin-right: auto; border: 1px solid; border-collapse: collapse;">
            <tr style="background-color: blue; border: 1px solid;">
                <th style="padding: 10px; font-size: 20px; color: white;">Patient Name</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Number</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Email</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Doctor Name</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Date</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Message</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Status</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Approved</th>
                <th style="padding: 10px; font-size: 20px; color: white;">Canceled</th>
            </tr>
            @foreach ($data as $appoints)
            <tr>
                <td style="padding: 10px; ">{{$appoints->name}}</td>
                <td style="padding: 10px;">{{$appoints->phone}}</td>
                <td style="padding: 10px;">{{$appoints->email}}</td>
                <td style="padding: 10px;">{{$appoints->doctor}}</td>
                <td style="padding: 10px; ">{{$appoints->date}}</td>
                <td style="padding: 10px;">{{$appoints->message}}</td>
                <td style="padding: 10px; ">{{$appoints->status}}</td>
                <td style="padding: 10px; ">
                    <a class="btn btn-success" style="color: white; background-color: green; padding: 5px 10px; text-decoration: none;" onclick="return confirm('Are you sure to approve this?')" href="{{url('approve_appointment', $appoints->id)}}">Approve</a>
                </td>
                <td style="padding: 10px;">
                    <a class="btn btn-danger" style="color: white; background-color: red; padding: 5px 10px; text-decoration: none;" onclick="return confirm('Are you sure to cancel this?')" href="{{url('cancel_appointment', $appoints->id)}}">Cancel</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>




    @include('admin.script')
  </body>
</html>
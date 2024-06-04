<!DOCTYPE html>
<html lang="en">
  <head> 
    <base href="/public">
    @include('admin.css')
    
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.navbar')
        <div class="container-fluid page-body-wrapper border border-primary rounded p-3 mt-3">
            <div class="container" align="center" style="padding-top:50px">
                @if(session()->has('messege'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('messege')}}
                </div>
                @endif

                <form action="{{ url('edit_doctor', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="padding:15px">
                        <label for="name">Doctor Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$data->name}}" >
                    </div>

                    <div class="form-group" style="padding:15px">
                        <label for="phone">Contact:</label>
                        <input type="number" class="form-control" name="phone" value="{{$data->contact}}" >
                    </div>

                    <div class="form-group" style="padding:15px">
                        <label for="department">Department:</label>
                        <select name="department" class="form-control" >
                            <option value="{{$data->department}}">{{$data->department}}</option>
                            <option value="ICU">ICU</option>
                            <option value="Heart">Heart</option>
                            <option value="ENT">ENT</option>
                            <option value="Skin">Skin</option>
                            <option value="Gyne">Gyne</option>
                            <option value="Orthopadics">Orthopadics</option>
                        </select>
                    </div>

                    <div class="form-group" style="padding:15px">
                        <label for="room">Room Number:</label>
                        <input type="text" class="form-control" name="room" value="{{$data->room}}">
                    </div>

                    <div class="form-group" style="padding:15px" >
                        <label for="image">Doctor Image:</label>
                        <div class="custom-file">
                        <img src="doctor_image/{{$data->image}}" alt="" height="40px" width=" 40px"> 
                          <input type="file" class="custom-file-input" id="image" name="image">
                          <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group" style="padding:15px">
                        <input type="submit" name="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.script')

    
  </body>
</html>

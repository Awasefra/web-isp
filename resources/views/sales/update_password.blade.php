@extends('layouts.master')
    @section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Change Your Password </h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <form action="{{route('password-update')}}"  method="POST" enctype="multipart/form-data"> 
                        @method('put')
                        @csrf
                       
        
                        <div class="form-group">
                            <label for="current_password" class="control-label">Current Password</label>
                            <input type="password" class="form-control" name="current_password" id="current_password">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                            @error('current_password')
                                <div class="text-red-500 mt-2 text-sm">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">New Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                            @error('password')
                                <div class="text-red-500 mt-2 text-sm">{{$message}}</div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="control-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                            @error('password_confirmation')
                                <div class="text-red-500 mt-2 text-sm">{{$message}}</div> 
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" id="updates">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
       

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
      </script>
@endsection
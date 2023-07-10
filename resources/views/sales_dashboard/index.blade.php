@extends('layouts.master')
@section('content')
@extends('layouts.master')
@section('content')

<div class="content">
    <h2 class="text-center"> DASHBOARD</h2>
</div>
</br>
</br>

 <div class="row">
    <div class=" col-md-3" style="border: 1px solid gray; border-radius:25px; padding:3rem; margin-left: 13rem;margin-right: 13rem;" >
        <a href="{{route('customer')}}" style=" color: #545a5f;
       
        text-decoration: none;"> 
        <div class="body-card">
            
            <h1>Customer</h1>
            <p>Jumlah Customer :</p>
            <svg style="width: 50px; float: right" fill="none" stroke="#303030" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            
        </div>
    </a>
    </div>
    <div class=" col-md-3" style="border: 1px solid gray; border-radius:25px; padding:3rem;" >
        <a href="{{'password_update'}}" style=" color: #545a5f;
       
        text-decoration: none;"> 
        <div class="body-card">
            
            <h1>Update Password</h1>
            <p></p>
            <svg style="width: 50px; float: right" fill="none" stroke="#303030" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            
        </div>
    </a>
    </div>
    
</div>
@endsection
@endsection
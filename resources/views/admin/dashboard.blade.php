@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">

        <!-- @if(session('message'))
      <h2 class="alert alert-success">{{session('message')}},</h2>
   @endif -->
        <div class="me-md-3 me-xl-5">
            <h2>Welcome, {{ Auth::user()->name }} </h2>
            <p class="mb-md-0">Project Nalytics</p>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">All Users</label>
                    <h1>{{$totalAllUsers}}</h1>
                    <a href="{{url('admin/users')}}" class="text-white">View Users</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label for="">Total Admin Users</label>
                    <h1>{{$totalAdmin }}</h1>
                    <a href="{{url('admin/users')}}" class="text-white">View Users</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3">
                    <label for="">Total Registered Users</label>
                    <h1>{{$totalUsers}}</h1>
                    <a href="{{url('admin/users')}}" class="text-white">View Users</a>
                </div>
            </div>
        </div>



    </div>
</div>


</div>
</div>
@endsection
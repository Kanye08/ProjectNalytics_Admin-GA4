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
                    <label for="">Total Subscribers</label>
                    <h1>{{$totalAllUsers}}</h1>
                    <a href="{{url('admin/users')}}" class="text-white">View Users</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body bg-secondary text-white mb-3">
                    <label for="">Total Admin</label>
                    <h1>{{$totalAdmin }}</h1>
                    <a href="{{url('admin/users')}}" class="text-white">View Users</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label for="">Total Users</label>
                    <h1>{{$totalUsers}}</h1>
                    <a href="{{url('admin/users')}}" class="text-white">View Users</a>
                </div>
            </div>
        </div>



    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12 grid-margin">

        <!-- @if(session('message'))
      <h2 class="alert alert-success">{{session('message')}},</h2>
   @endif -->

        <div class="row">



            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    var _ydata = JSON.parse('{!! json_encode($month) !!}');
    var _xdata = JSON.parse('{!! json_encode($monthCount) !!}');
</script>
<script src="{{asset('/chart/chart-area-demo.js')}}"></script>
<script src="{{asset('/chart/chart-bar-demo.js')}}"></script>

@endsection
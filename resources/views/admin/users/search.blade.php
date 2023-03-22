@extends('layouts.admin')


@section('title','Users')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif -->
        <div class="card">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <!-- <a class="navbar-brand">Navbar</a> -->
                    <form class="d-flex" method="GET" action="{{url('/search')}}" role="search">

                        <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <hr>
            <div class="card-header">

                <h3>Users
                    <a href="{{url('admin/users')}}" class="btn btn-primary float-end">
                        Back
                    </a>
                </h3>
                <!-- filter -->
                <form action="" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Filter by Date</label>
                            <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d')}}" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="">Filter by Status</label>
                            <select name="status" class="form-select">
                                <option value="">Select All Status</option>
                                <option value="Admin" {{Request::get('role_as') == '1' ? 'selected' : ''}}>
                                    Admin
                                </option>
                                <option value="User" {{Request::get('role_as') == '0' ? 'selected' : ''}}>
                                    User</option>

                            </select>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->role_as == '0')
                                    <label for="" class="badge btn-primary">User</label>
                                    @elseif($user->role_as == '1')
                                    <label for="" class="badge btn-secondary">Admin</label>
                                    @else
                                    <label for="" class="badge btn-primary">None</label>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{url('admin/users/'.$user->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Users Available</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
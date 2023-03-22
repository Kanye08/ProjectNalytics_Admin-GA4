 @extends('layouts.admin')

 @section('title','Google Reports List')


 @section('content')
 <div class="container">
     <div class="card mt-3 mb-3">
         <div class="card-header text-center">
             <h4>Google Analytics Data</h4>
         </div>
         <div class="card-body">
             <form action="{{ route('google.import') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 <input type="file" name="file" class="form-control">
                 <br>
                 <button class="btn btn-primary">Import User Data</button>
             </form>

             <table class="table table-bordered mt-3">
                 <tr>
                     <th colspan="3">
                         List Of Files
                         <a class="btn btn-danger float-end" href="{{ route('google.export') }}">Export User Data</a>
                     </th>
                 </tr>
                 <tr>
                     <th>ID</th>
                     <th>Day</th>
                     <th>Users</th>
                     <th>Download Time</th>
                 </tr>
                 @foreach($googles as $google)
                 <tr>
                     <td>{{ $google->id}}</td>

                     <td>{{ $google->file_name }}</td>
                     <td>{{ $google->file_path }}</td>
                     <td>{{ $google->downloaded_at }}</td>
                 </tr>
                 @endforeach
             </table>

         </div>
     </div>
 </div>
 @endsection
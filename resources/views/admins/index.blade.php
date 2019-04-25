@extends('layout')
@section('content')
<div class="card mt-5">
  <div class="card-header bg-dark text-light h2 font-weight-bold"><i class="fas fa-user-cog "></i> Manage Admins </div>
  <div class="card-body">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif

    <form class="form-inline justify-content-end my-lg-0" method="post" action="{{ route('admins.index') }}">
      @csrf
      <label class="mr-2 font-italic" for="admin_username">Admin Username:</label>
      <input class="form-control mr-sm-2" type="search" placeholder="Search Here" name="admin_username" id="admin_username">
      <label class="mr-2 ml-3 font-italic" for="admin_name">Admin Name:</label>
      <input class="form-control mr-sm-2" type="search" placeholder="Search Here" name="admin_name" id="admin_name">
      <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
    </form>

    <table class="table mt-3">
      <thead class="bg-light">
          <tr>
            <td class="h5 font-weight-bold">#</td>
            <td class="h5 font-weight-bold">Admin Name</td>
            <td class="h5 font-weight-bold">Admin Username</td>
            <td class="h5 font-weight-bold">Date Created</td>
            <td class="h5 font-weight-bold">Date Updated</td>
            <td><a href="{{ route('admins.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a></td>
          </tr>
      </thead>
      <tbody>
          @foreach($admins as $admin)
          <tr>
              <td>{{$admin->admin_id}}</td>
              <td>{{$admin->admin_name}}</td>
              <td>{{$admin->admin_username}}</td>
              <td>{{$admin->created_at}}</td>
              <td>{{$admin->updated_at}}</td>
              <td class="form-inline">
                  <a href="{{ route('admins.edit',$admin->admin_id)}}" class="btn btn-primary mr-1"><i class="far fa-edit"></i></a>
                  <form action="{{ route('admins.destroy', $admin->admin_id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                  </form>
              </td>
          </tr>
          @endforeach
          
      </tbody>
    </table>
  <div>
<div>
@endsection
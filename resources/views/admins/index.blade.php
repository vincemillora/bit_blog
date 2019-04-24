@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <p class="h1 mb-3">Manage Admins</p>

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <form class="form-inline my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0 mr-1" type="submit"><i class="fas fa-search"></i></button>
    <a href="{{ route('admins.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
  </form>
  <table class="table mt-2">
    <thead class="thead-dark">
        <tr>
          <td>ID</td>
          <td>Admin Name</td>
          <td>Admin Username</td>
          <td>Date Created</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
        <tr>
            <td>{{$admin->admin_id}}</td>
            <td>{{$admin->admin_name}}</td>
            <td>{{$admin->admin_username}}</td>
            <td>{{$admin->created_at}}</td>
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
@endsection
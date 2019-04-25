@extends('layout')
@section('content')
<div class="card mt-5">
  <div class="card-header bg-dark text-light h2 font-weight-bold"><i class="fas fa-users"></i> Manage Users </div>
  <div class="card-body">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif

    <form class="form-inline my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0 mr-1" type="submit"><i class="fas fa-search"></i></button>
      
    </form>
    <table class="table mt-3">
      <thead class="bg-light">
          <tr>
            <td class="h5 font-weight-bold">Email</td>
            <td class="h5 font-weight-bold">Name</td>
            <td class="h5 font-weight-bold">Account Url</td>
            <td class="h5 font-weight-bold">Is Enabled</td>
            <td class="h5 font-weight-bold">Account Image</td>
            <td class="h5 font-weight-bold">Header Image</td>
            <td class="h5 font-weight-bold">Date Created</td>
            <td class="h5 font-weight-bold">Date Updated</td>
            <td><a href="{{ route('users.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a></td>
          </tr>
      </thead>
      <tbody>
          @foreach($users as $user)
          <tr>
              <td>{{$user->user_email}}</td>
              <td>{{$user->user_name}}</td>
              <td>{{$user->account_url}}</td>
              <td>{{$user->is_enabled}}</td>
              <td>{{$user->account_img}}</td>
              <td>{{$user->header_img}}</td>
              <td>{{$user->created_at}}</td>
              <td>{{$user->updated_at}}</td>
              <td class="form-inline">
                  <a href="{{ route('users.edit', $user->user_email)}}" class="btn btn-primary mr-1"><i class="far fa-edit"></i></a>
                  <form action="{{ route('users.destroy', $user->user_email)}}" method="post">
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
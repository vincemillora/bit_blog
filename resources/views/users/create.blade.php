@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header h3">
    <i class="fas fa-plus"></i> Create New User
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('users.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">User Email:</label>
              <input type="text" class="form-control" name="user_email"/>
          </div>
          <div class="form-group">
              <label for="price">User Name :</label>
              <input type="text" class="form-control" name="user_name"/>
          </div>
          <div class="form-group">
              <label for="quantity">Password:</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
          <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
      </form>
  </div>
</div>
@endsection
@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header h3">
    Create New Admin
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
      <form method="post" action="{{ route('admins.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Admin Username:</label>
              <input type="text" class="form-control" name="admin_username"/>
          </div>
          <div class="form-group">
              <label for="price">Admin Name :</label>
              <input type="text" class="form-control" name="admin_name"/>
          </div>
          <div class="form-group">
              <label for="quantity">Password:</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
          <a href="{{ route('admins.index') }}" class="btn btn-danger">Cancel</a>
      </form>
  </div>
</div>
@endsection
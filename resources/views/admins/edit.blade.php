@extends('layout')
@section('content')
<div class="card mt-5">
  <div class="card-header h3 bg-dark text-light font-weight-bold"><i class="far fa-edit"></i> Edit Admin </div>
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
      <form method="post" action="{{ route('admins.update', $admin->admin_id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Admin Name:</label>
          <input type="text" class="form-control" name="admin_name" value={{ $admin->admin_name }} />
        </div>
        <div class="form-group">
          <label for="price">Admin Username:</label>
          <input type="text" class="form-control" name="admin_username" value={{ $admin->admin_username }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admins.index') }}" class="btn btn-danger">Cancel</a>
      </form>
  </div>
</div>
@endsection
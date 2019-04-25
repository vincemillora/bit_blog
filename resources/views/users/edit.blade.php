@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header h3">
    <i class="far fa-edit"></i> Update User
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
      <form method="post" action="{{ route('users.update', $user->user_email) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">User Email:</label>
          <input type="text" class="form-control" name="user_email" value={{ $user->user_email }} />
        </div>
        <div class="form-group">
          <label for="price">User Name:</label>
          <input type="text" class="form-control" name="user_name" value={{ $user->user_name }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
      </form>
  </div>
</div>
@endsection
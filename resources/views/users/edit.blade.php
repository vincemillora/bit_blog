@extends('layout')
@section('content')
<div class="card mt-5">
  <div class="card-header bg-dark text-light h3 font-weight-bold"><i class="far fa-edit"></i> Update User </div>
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
          <label for="user_email">User Email:</label>
          <input type="text" class="form-control" name="user_email" id="user_email" value={{ $user->user_email }} />
        </div>
        <div class="form-group">
          <label for="user_name">User Name:</label>
          <input type="text" class="form-control" name="user_name" id="user_name" value={{ $user->user_name }} />
        </div>
        @if($user->is_enabled == 1)
        <div class="form-group">
          <label for="is_enabled">Is Enabled:</label>
          <select class="form-control" id="is_enabled" name="is_enabled" id="is_enabled">
            <option value="1" selected="selected">Yes</option>
            <option value="0" >No</option>
          </select>
        </div>
        @else
        <div class="form-group">
          <label for="is_enabled">Is Enabled:</label>
          <select class="form-control" id="is_enabled" name="is_enabled" id="is_enabled">
            <option value="1" >Yes</option>
            <option value="0" selected="selected">No</option>
          </select>
        </div>
        @endif

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
      </form>
  </div>
</div>
@endsection
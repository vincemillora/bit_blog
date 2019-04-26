@extends('layout')
@section('content')
<div class="card mt-5">
  <div class="card-header bg-dark text-light h2 font-weight-bold"><i class="fas fa-comments"></i> Manage Comments </div>
  <div class="card-body">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif

    <form class="form-inline justify-content-end my-lg-0" method="post" action="{{ route('admins.index') }}">
      @csrf
      <label class="mr-2 font-italic" for="post_id">Post ID:</label>
      <input class="form-control mr-sm-2" type="search" placeholder="Search Here" name="post_id" id="post_id">
      <label class="mr-2 ml-3 font-italic" for="user_email">Comment Creator:</label>
      <input class="form-control mr-sm-2" type="search" placeholder="Search Here" name="user_email" id="user_email">
      <label class="mr-2 ml-3 font-italic" for="comment_message">Comment Message:</label>
      <input class="form-control mr-sm-2" type="search" placeholder="Search Here" name="comment_message" id="comment_message">
      <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
    </form>

    <table class="table mt-3">
      <thead class="bg-light">
          <tr>
            <td class="h5 font-weight-bold">#</td>
            <td class="h5 font-weight-bold">Post ID</td>
            <td class="h5 font-weight-bold">Comment Creator</td>
            <td class="h5 font-weight-bold">Message</td>
            <td class="h5 font-weight-bold">Date Created</td>
            <td class="h5 font-weight-bold">Date Updated</td>
            <td class="h5 font-weight-bold">Actions</td>
          </tr>
      </thead>
      <tbody>
          @foreach($comments as $comment)
          <tr>
              <td>{{$comment->comment_id}}</td>
              <td>{{$comment->post_id}}</td>
              <td>{{$comment->user_email}}</td>
              <td>{{$comment->comment_message}}</td>
              <td>{{$comment->created_at}}</td>
              <td>{{$comment->updated_at}}</td>
              <td class="form-inline">
                  
                  <form action="{{ route('comments.destroy', $comment->comment_id)}}" method="post">
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
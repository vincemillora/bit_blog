@extends('layout')
@section('content')
<div class="card mt-5">
  <div class="card-header bg-dark text-light h2 font-weight-bold"><i class="fas fa-comment "></i> Manage Blog Posts </div>
  <div class="card-body">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif

    <form class="form-inline justify-content-end my-lg-0" method="post" action="{{ route('admins.index') }}">
      @csrf
      <label class="mr-2 font-italic" for="post_title">Post Title:</label>
      <input class="form-control mr-sm-2" type="search" placeholder="Search Here" name="post_title" id="post_title">
      <label class="mr-2 ml-3 font-italic" for="post_message">Post Message:</label>
      <input class="form-control mr-sm-2" type="search" placeholder="Search Here" name="post_message" id="post_message">
      <label class="mr-2 ml-3 font-italic" for="user_email">Post Creator:</label>
      <input class="form-control mr-sm-2" type="search" placeholder="Search Here" name="user_email" id="user_email">
      <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
    </form>

    <table class="table mt-3">
      <thead class="bg-light">
          <tr>
            <td class="h5 font-weight-bold">#</td>
            <td class="h5 font-weight-bold">Post Title</td>
            <td class="h5 font-weight-bold">Post Message</td>
            <td class="h5 font-weight-bold">Post Creator</td>
            <td class="h5 font-weight-bold">Date Created</td>
            <td class="h5 font-weight-bold">Date Updated</td>
            <td class="h5 font-weight-bold">Actions</td>
          </tr>
      </thead>
      <tbody>
          @foreach($posts as $post)
          <tr>
              <td>{{$post->post_id}}</td>
              <td>{{$post->post_title}}</td>
              <td>{{$post->post_message}}</td>
              <td>{{$post->user_email}}</td>
              <td>{{$post->created_at}}</td>
              <td>{{$post->updated_at}}</td>
              <td class="form-inline">
                  
                  <form action="{{ route('blog_posts.destroy', $post->post_id)}}" method="post">
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
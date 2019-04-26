<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BIT Admin</title>
    <script src="js/app.js" charset="utf-8"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">BITter</a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"> <i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-bars"></i> Menu</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('admins.index') }}"> <i class="fas fa-user-cog "></i> Manage Admins</a>
            <a class="dropdown-item" href="{{ route('users.index') }}"><i class="fas fa-users"></i> Manage Users</a>
            <a class="dropdown-item" href="{{ route('blog_posts.index') }}"><i class="fas fa-comment"></i></i> Manage Blog Posts</a>
          </div>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#"> <i class="fas fa-sign-out-alt"></i> Logout <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </nav>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
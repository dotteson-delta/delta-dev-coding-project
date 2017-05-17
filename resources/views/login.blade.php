<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Code Project</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <style>
    html, body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Raleway', sans-serif;
      font-weight: 100;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .top-left {
      position: absolute;
      left: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links > a {
      color: #8892BF;
      padding: 0 25px;
      font-size: 16px;
      font-weight: 700;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="flex-center position-ref full-height">

  <div class="top-left links">
    <a href="{{ url('/') }}">< Back</a>
  </div>

  <div class="content">
    <div class="title m-b-md">
      Login
    </div>

    <div class="container">
      <form class="form-inline" action="{{ action('AuthController@login') }}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="email">Username</label>
          <input type="email" class="form-control" name="email" id="email" required>

          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" required>

          <button type="submit" class="btn btn-primary">Go</button>
        </div>
      </form>
    </div>

    <div class="links">
    </div>
  </div>
</div>
</body>
</html>
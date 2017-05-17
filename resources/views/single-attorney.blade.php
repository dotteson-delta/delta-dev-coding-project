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

  <div class="top-left links">
    <a href="{{ url('/attorneys') }}">< BACK</a>
  </div>

<div class="flex-center position-ref full-height">

  <div class="content">
    <div class="title m-b-md">
      Attorney Details
    </div>

    <h2>{{ $attorney_detail->firstName . " " . $attorney_detail->lastName }}</h2>
    <p><b>Phone Number: </b>{{ $attorney_detail->phone }}</p>
    <p><b>Email: </b>{{ $attorney_detail->email }}</p>
    <p><b>City: </b>{{ $attorney_detail->city }}</p>
    <p><b>State: </b>{{ $attorney_detail->state }}</p>
    <p><b>Address: </b>{{ $attorney_detail->address }}</p>
    <p><b>Website: </b>{{ $attorney_detail->website }}</p>
    <p><b>Critical Response Team: </b>@if($attorney_detail->isCriticalResponseTeamMember) Yes @else NO @endif</p>

    <div class="links">
    </div>
  </div>
</div>
</body>
</html>
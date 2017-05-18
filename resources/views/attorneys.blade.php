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

    .table th {
      text-align: center;
    }

    .m-b-md {
      margin-bottom: 30px;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

  <div class="top-left links">
    <a href="{{ url('/') }}">Home</a>
  </div>

  <div class="top-right links">
    <a href="{{ url('/login') }}"></a>
  </div>

  <div class="content">
    <div class="title m-b-md">
      Attorneys
    </div>

    @if( ! $favorite_attorneys->isEmpty() )

    <div class="container">
      <h2>Favorites</h2>
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>Attorney Name</th>
            <th>Firm Name</th>
            <th>City</th>
            <th>State</th>
            <th>Remove Favorite</th>
            <th>Details</th>
          </tr>
        </thead>
        @foreach($favorite_attorneys as $fav_attorney)
          <tbody>
            <tr>
              <td>{{ $fav_attorney->name }}</td>
              <td>{{ $fav_attorney->firm_name }}</td>
              <td>{{ $fav_attorney->city }}</td>
              <td>{{ $fav_attorney->state }}</td>
              <td><a href="{{ url('/remove-favorite-attorney') . '/' . $fav_attorney->attorney_id }}" class="btn btn-danger" role="button">Unfavorite</a></td>
              <td><a href="{{ url('/attorney') . '/' . $fav_attorney->attorney_id }}" class="btn btn-primary" role="button">View</a></td>
            </tr>
          </tbody>
        @endforeach
      </table>
    </div>

    @endif

    <div class="container">
      <h2>All</h2>
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>Attorney Name</th>
            <th>Firm Name</th>
            <th>City</th>
            <th>State</th>
            <th>Make Favorite</th>
            <th>Details</th>
          </tr>
        </thead>
        @foreach($attorneys as $attorney)
          <tbody>
            <tr>
              <td>{{ $attorney->firstName . " " . $attorney->lastName }}</td>
              <td>{{ $attorney->firmName }}</td>
              <td>{{ $attorney->city }}</td>
              <td>{{ $attorney->state }}</td>
              <td><a href="{{ url('/favorite-attorney') . '/' . $attorney->sfid }}" class="btn btn-warning" role="button">Favorite</a></td>
              <td><a href="{{ url('/attorney') . '/' . $attorney->sfid }}" class="btn btn-primary" role="button">View</a></td>
            </tr>
          </tbody>
        @endforeach
      </table>

      <div class="row">
        <div class="col-sm-12">
          @if ( $pagination->total_pages > 1)
            <ul class="pagination">

              <li class="{{ ($pagination->current_page == 1) ? ' disabled' : '' }}">
                @if(isset($pagination->links->previous))
                  <a href="{{ url('/attorneys') . strstr($pagination->links->previous, '?') }}"> Prev </a>
                @endif
              </li>

              @for ($i=1; $i <= $pagination->total_pages; $i++)
                <li class="{{ ($pagination->current_page == $i) ? ' active' : '' }}">
                  @if(isset($pagination->links->next))
                    <a href="{{ url('/attorneys') . strstr($pagination->links->next, '?') }}">{{ $i }}</a>
                  @endif
                </li>
              @endfor

              <li class="{{ ($pagination->current_page == $pagination->total_pages ? ' disabled' : '') }}">
                @if(isset($pagination->links->next))
                  <a href="{{ url('/attorneys') . strstr($pagination->links->next, '?') }}"> Next </a>
                @endif
              </li>
            </ul>

          @endif
        </div>
      </div>
    </div>
  </div>
</body>
</html>
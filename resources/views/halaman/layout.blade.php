<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login to Everdwell</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Raleway'>
<link rel='stylesheet prefetch' href='http://weloveiconfonts.com/api/?family=fontawesome'>

      <link rel="stylesheet" href="css/format.css">

  
</head>

<body>
  <form  id="login-form" action ="{{route('register')}}" method ="post">
  {{csrf_field()}}
  @yield('content')
  <div class="right">
    <div class="connect">Connect with</div>
    <a href="" class="facebook">
      <span class="fontawesome-facebook"></span>
    </a> <br />
    <a href="" class="twitter">
      <span class="fontawesome-twitter"></span>
    </a> <br />
    <a href="" class="google-plus">
      <span class="fontawesome-google-plus"></span>
    </a>
  </div>
</form>
  
    <script src="js/index.js"></script>

</body>
</html>

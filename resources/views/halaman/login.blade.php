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
  <form  id="login-form" method ="post" action ="{{route('login')}}">
  {{csrf_field()}}
  <div class="heading">
    Log In 
  </div>
  <div class="left">
    <label for="email">Email</label> <br />
    <input type="email" name="user_email" id="user_email" /> <br />
    <label for="password">Password</label> <br />
    <input type="password" name="user_password" id="user_password" /> <br /><br />
     <span class ="note">New to PenDay? 
        <a href ="sign">Sign Up</a> <br />
        <a href="lupa_pwd">Lupa password?</a>
     </span>
     <br /><br /><br /><br />
    <input type="submit" value="Login" />
  </div>

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
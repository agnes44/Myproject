@extends('halaman.layout')

@section('content')
    <div class="heading">
     Sign Up
  </div>
  <div class="left">
    <label>
        First Name*</span>
    </label>
     <input type="text" required autocomplete="off"  name ="first_name" id ="first_name"/>
     <label>
        Last Name*</span>
      </label>
      <input type="text"required autocomplete="off" name ="last_name" id ="last_name" /> <br />
      <label>
        Username*</span>
      </label>
      <input type="text"required autocomplete="off" name ="user_name" id ="user_name"/> <br />
      <label for="email">Email</label> <br />
      <input type="email" name="user_email" id="user_email" /> 
      <label for="password">Password</label> 
      <input type="password" name="user_password" id="user_password" />
      <br /><br /><br />
      <input type="submit" value="Sign Up" />
  </div>
@endsection

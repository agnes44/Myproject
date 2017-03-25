@extends('layouts.layouts')

@section('content')
<a href="/anggota" class ="btn btn-info">Back</a>
<div class="col-lg-4">
        <form class="form-horizontal" action="{{route('anggota.store')}}" method ="post">
        {{csrf_field()}}

                  <label>Username</label>
                  <input type="text" name="name" class="form-control" placeholder="Username" required> <br>

                  <label>Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Email" required> <br>
 
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="password" required><br><br>

                   <button type="submit" class ="btn btn-success">Submit</button>

        </form>
</div>
@endsection
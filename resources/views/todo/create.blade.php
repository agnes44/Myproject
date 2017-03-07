@extends('layout.layout')

@section('contents')
<div class="col-lg-4 ">
        <form class="form-horizontal" action="/todo" method ="post">
        {{csrf_field()}}
            <input type="text" name ="title" placeholder="title" class="form-control"> <br \>
                 {{ ($errors -> has('title')) ? $errors->first('title') : ' ' }} 
             <input type="text" class ="form-control" id ="body" name ="body" placeholder="Your body here" required="required">
                 {{ ($errors -> has('body')) ? $errors->first('body') : ' ' }} <br \>
              <input type="date" name ="due_date" placeholder="" class="form-control">
                <br \> 
             <button class ="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New</button> 
</div>
@endsection
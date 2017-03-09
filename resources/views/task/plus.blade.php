@extends('layout.layout')

@section('contents')
<div class="col-lg-4 ">
        <form class="form-horizontal" action="/task" method ="post">
        {{csrf_field()}}
            <input type="text" name ="title" placeholder="title" class="form-control"> <br \>
                 {{ ($errors -> has('title')) ? $errors->first('title') : ' ' }} 
            <input type="text" name ="id_todos" placeholder="" class="form-control"> <br \>
             <button class ="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New</button> 
</div>
@endsection
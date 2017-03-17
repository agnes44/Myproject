@extends('layout.layout')

@section('contents')
<div class="col-lg-4 ">
        <form class="form-horizontal" action="/lines" method ="post">
        {{csrf_field()}}
            <input type="text" name ="title" placeholder="title" class="form-control"> <br \>
                 {{ ($errors -> has('title')) ? $errors->first('title') : ' ' }} 
            <input type="text" name ="id_outlines" placeholder="id_outlines here" class="form-control"> 
                {{ ($errors->has('outlines_id'))? $errors->first('todos_id'): ' ' }} <br \> <br>
             <button class ="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New</button> 
</div>
@endsection
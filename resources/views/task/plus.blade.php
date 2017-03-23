@extends('layout.layout')

@section('contents')
<div class="col-lg-4 ">
        <form class="form-horizontal" action="/task" method ="post">
        {{csrf_field()}}
            <input type="text" name ="title" placeholder="title" class="form-control"> <br \>
                 {{ ($errors -> has('title')) ? $errors->first('title') : ' ' }} 
            <input type="date" name ="due_date" placeholder="" class="form-control"><br \>
            <select name="id_todos">
                <option>--Pilih ID Todo </option>
                @foreach ($task as $todo)
                    <option value="{{ $todos->id_todos }}">{{ $todos->nama }}</option>
                @endforeach
            </select>
            {{ ($errors->has('todos_id'))? $errors->first('todos_id'): ' ' }} <br \> <br>
            {{-- <input type="text" name ="id_todos" placeholder="id todo here" class="form-control"> 
                {{ ($errors->has('todos_id'))? $errors->first('todos_id'): ' ' }} <br \> <br> --}}
             <button class ="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New</button> 
</div>
@endsection
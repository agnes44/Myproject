@extends('layout.layout')

@section('contents')
<h1>Halaman Show</h1>
    <fieldset>
        <ul class="col-md-5">
            <li class="list-group-item">
                {{ $item->title }} <br \>
                {{ $item->body }} <br \>
                {{ $item->start }} <br \>
                {{ $item->ends }}
            </li>
        </ul>
    </fieldset>
@endsection


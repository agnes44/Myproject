@extends('layout.layout')

@section('contents')
<h1>Halaman single</h1>
    <fieldset>
        <ul class="col-md-5">
            <li class="list-group-item">
                {{ $item->title }} <br \>
                {{ $item->body }} <br \>
            </li>
        </ul>
    </fieldset>
@endsection
@extends('layout.layout')

@section('contents')
<h1>Halaman single</h1>

{{ $item->title }} <br \>
{{ $item->body }} <br \>
{{ $item->due_date }} <br \>
@endsection
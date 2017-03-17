 @extends('layout.layout')

@section('contents')
<div id="header">
    @foreach ($catatan as $note)
        <div class="header float-container">
            <h1 style="text-overflow: ellipsis; overflow: hidden;">{{($note->title)}}</h1>
        </div>

        <div >
            
        </div>
    @endforeach
</div>
@endsection
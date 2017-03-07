 @extends('layout.layout')

@section('contents')
<a href="schedule/create" class ="btn btn-info">Add New</a>
<div class="col-lg-6 col-lg-offset-3">
    <h1>Schedule</h1>
        <ul class="list-group col-lg-8">
                @foreach ($jadwal as $schedule)
                    <li class="list-group-item">
                        <a href="{{'/schedule/'.$schedule->id}}">{{ucfirst($schedule->title)}}</a>
                        <span class="pull-right">{{$schedule->created_at->diffForHumans()}}</span>
                    </li>
                @endforeach
        </ul> 

         <ul class="list-group col-lg-4">
            @foreach ($jadwal as $schedule)
                <li class="list-group-item">
                    <a href="{{'/schedule/'.$schedule->id.'/edit'}}"><span class="glyphicon glyphicon-edit"></span</a>

                    <form method ="post" action ="{{'/schedule/'.$schedule->id}}"  class="form-group pull-right col-lg-3">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" style="border:none;"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                </li>
            @endforeach
        </ul>
</div>
@endsection
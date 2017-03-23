 @extends('layout.layout')

@section('contents')
<div class="form-group row add">
       <div class="form-group">
            <div class="col-md-2" >
                 <a href="tambah" class ="btn btn-info">Add New</a>
            </div>
       </div>          
</div>

<div class="task-content">
 <ul class="task-list"> 
        @foreach ($ide as $outlines)
            <li>
                <div class="task-title">
                    <span class="task-title-sp">
                        <a href="/line">{{($outlines->body)}}</a>
                    </span>
                    <span class="label label-success">{{$outlines->created_at->diffForHumans()}}</span>
                    <div class="pull-right hidden-phone">
                        <a href="/plus">
                            <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                        </a>
                        <a href="{{'/outlines/'.$outlines->id.'/edit'}}">
                            <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <form method ="post" action ="{{'/outlines/'.$outlines->id}}" class="pull-right hidden-phone">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                        </form>      
                    </div>
                </div>
            </li>                  
        @endforeach
    </ul>
</div>
@stop
 @extends('layout.layout')

@section('contents')
<div class="form-group row add">
       <div class="form-group">
            <div class="col-md-2" >
                 <a href="create" class ="btn btn-info">Add New</a>
            </div>
       </div>          
</div>
<div class="task-content">
 <ul class="task-list"> 
        @foreach ($todos as $todo)
            <li>
                <div class="task-checkbox">
                    <!-- <input type="checkbox" class="list-child" value=""  /> -->
                        <input type="checkbox" class="flat-grey list-child"/>
                    <!-- <input type="checkbox" class="square-grey"/> -->
                </div>
                <div class="task-title">
                    <span class="task-title-sp">
                        <a href="/task">{{($todo->body)}}</a>
                    </span>
                    <span class="label label-success">{{$todo->created_at->diffForHumans()}}</span>
                    <div class="pull-right hidden-phone">
                        <a href="/plus">
                            <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                        </a>
                        <a href="{{'/todo/'.$todo->id.'/edit'}}">
                            <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <form method ="post" action ="{{'/todo/'.$todo->id}}" class="pull-right hidden-phone">
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
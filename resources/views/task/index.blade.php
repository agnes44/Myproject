 @extends('layout.layout')

 @section('contents')
 <a href="/plus" class ="btn btn-info">Create List</a> <br \><br \>
 <div class="col-lg-12 ">
        <form class="form-horizontal" action="/todo" method ="post">
        {{csrf_field()}}
             <input type="text" class ="form-control" id ="body" name ="body" placeholder="Your body here" required="required">
                 {{ ($errors -> has('body')) ? $errors->first('body') : ' ' }} <br \>
             
        </form>
</div>
<ul class="task-list"> 
        @foreach ($todos as $todo)
                <div class="todo-title">
                    <h3>{{($todo->body)}}</h3>
                </div>

        <ul class="task-list"> 
            <li>
                <div class="task-checkbox">
                    <!-- <input type="checkbox" class="list-child" value=""  /> -->
                        <input type="checkbox" class="flat-grey list-child"/>
                    <!-- <input type="checkbox" class="square-grey"/> -->
                </div>
                <div class="task-title">
                  @foreach (DB::table('tasks')->where('id_todos', $todo->id)->get() as $task)
                    {{ $task->title }}<br \>
                  @endforeach
                    {{-- <span class="task-title-sp">
                        <a href="{{'/task/'.$task->id_todos}}">{{($task->body)}}</a>
                    </span> --}}
              
                    <div class="pull-right hidden-phone">
                        <a href="create">
                            <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                        </a>
                       {{--  <a href="{{'/task/'.$task->id.'/edit'}}">
                            <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <form method ="post" action ="{{'/task/'.$task->id}}" class="pull-right hidden-phone">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                        </form>       --}}
                    </div>
                </div>
            </li>                  
      </ul>
        @endforeach
</ul>
@stop
 @extends('layout.layout')

 @section('contents')
 <a href="/plus" class ="btn btn-info">Create todo</a> <br \><br \>

<ul class="task-list"> 
        @foreach ($todos as $todo)
                <div class="todo-title">
                    <h4>{{($todo->body)}}</h4>
                </div>

        <ul class="task-list"> 
             @foreach (DB::table('tasks')->where('id_todos', $todo->id)->get() as $task)
            <li>
                <div class="task-checkbox">
                <!-- <input type="checkbox" class="list-child" value=""  /> -->
                    <input type="checkbox" name="check"  id="check" check="checked" value="1" class="flat-grey list-child"/>
                <!-- <input type="checkbox" class="square-grey"/> -->

                <div id="container"></div>
                </div>

                <div class="task-title">
                  <span class ="task-title-sp">{{ $task->title }}<br \></span>
                  <div class="pull-right hidden-phone">
                        <a href="/plus">
                            <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                        </a>
                        <a href="{{'/task/'.$task->id.'/edit'}}">
                            <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <form method ="post" action ="{{'/task/'.$task->id}}" class="pull-right hidden-phone">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                        </form>      
                    </div>
                </div>
            @endforeach
            </li>                  
      </ul>
        @endforeach
</ul>
@stop
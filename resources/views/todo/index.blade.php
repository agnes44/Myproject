 @extends('layout.layout')

@section('contents')
<div class="task-content">
<a href="todo/create" class ="btn btn-info">Add New</a>
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
                                                             <a href="{{'/todo/'.$todo->id}}">{{($todo->title)}}</a>
                                              </span>
                                              <span class="label label-success">{{$todo->created_at->diffForHumans()}}</span>
                                              <div class="pull-right hidden-phone">
                                              <a href="create">
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"> </i></button>
                                              </a>
                                                  <a href="{{'/todo/'.$todo->id.'/edit'}}"><button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button></a>
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
@endsection
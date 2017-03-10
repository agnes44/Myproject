

 @extends('layout.layout')

@section('contents')
<a href="note/create" class ="btn btn-info">Add New</a>
<br \> <br \> 
                                  <ul class="task-list">
                                  @foreach ($catatan as $note)
                                      <li>
                                          <div class="task-checkbox">
                                              <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                              <input type="checkbox" class="flat-grey list-child"/>
                                              <!-- <input type="checkbox" class="square-grey"/> -->
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">
                                                        <a href="{{'/note/'.$note->id}}">{{($note->title)}}</a>
                                              </span>
                                              <span class="label label-success">{{$note->created_at->diffForHumans()}}</span>
                                              <div class="pull-right hidden-phone">
                                              <a href="create">
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                              </a>
                                                  <a href="{{'/note/'.$note->id.'/edit'}}"><button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button></a>
                                                <form method ="post" action ="{{'/note/'.$note->id}}" class="pull-right hidden-phone">
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
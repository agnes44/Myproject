 @extends('layout.desain')

@section('kontent')
<div class="form-group row add">
       <div class="form-group">
            <div class="col-md-2" >
                 <a href="/admintodo/create" class ="btn btn-info">Add New</a>
            </div>
       </div>          
</div>
<div class="task-content">
 <ul class="task-list"> 
        @foreach ($admintodo as $todo)
            <li>
                <div class="task-checkbox">
                    <!-- <input type="checkbox" class="list-child" value=""  /> -->
                        <input type="checkbox" class="flat-grey list-child" name ="test"  value="test" id ="test" />
                        
                    <!-- <input type="checkbox" class="square-grey"/> -->
                </div>
                <div class="task-title">
                    <span class="task-title-sp">
                        <a href="/admintask">{{($todo->body)}}</a>
                    </span>
                    <span class="label label-success">{{$todo->created_at->diffForHumans()}}</span>
                    <div class="pull-right hidden-phone">
                        {{-- <a href="/plus">
                            <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                        </a> --}}
                        <a href="{{'/admintodo/'.$todo->id.'/edit'}}">
                            <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                         <button class="delete-modal btn btn-default btn-xs" data-id ="{{$todo->id}}"><span class="glyphicon glyphicon-trash"></span></button>
                    </div>
                </div>
            </li>                  
        @endforeach
    </ul>

    <div class="modal fade" id ="myModal"  role ="dialog">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 500px; margin : 0 auto;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss ="modal">
                            <span aria-hidden ="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Modal Title</h4>
                    </div>

                    <div class="modal-body">
                            <div class="deleteContent">
                                Are you sure you want to delete <span class="title"></span> ?
                                <span class="hidden id"></span>
                            </div>

                            <div class="modal-footer">
                                <button type ="button" class="btn actionBtn" data-dismiss ="modal">
                                    <span id="footer_action_button" class="glyphicon"></span>
                                </button>
                                <button type="button" class=" btn btn-warning" data-dismiss ="modal"><span class="glyphicon glyphicon-remove"></span> Close
                                </button>
                            </div>
                    </div>
                </div>
            </div>
      </div>
</div>
@stop
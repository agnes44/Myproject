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
            <li class="item{{$todo->id}}">
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
                    {{csrf_field()}}
                        <button class="edit-modal btn btn-primary" data-id ="{{$todo->id}}" data-body ="{{$todo->body}}">
                            <span class="glyphicon glyphicon-edit"></span>
                        </button>
                        <button class="delete-modal btn btn-danger" data-id ="{{$todo->id}}" data-body ="{{$todo->body}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                              
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
                        <form class="form-horizontal" role ="form">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    <label for="id" class="control-label col-sm-2">ID : </label>
                                        <div class="col-sm-10">
                                            <input type="text"  name ="id" class="form-control" id="fid" disabled>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label for="body" class="control-label col-sm-2">Title : </label>
                                        <div class="col-sm-10">
                                            <input type="name" name="body" class="form-control" id="b">
                                        </div>
                                </div>

                                  
                        </form>
                            
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
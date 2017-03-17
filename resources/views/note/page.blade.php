 @extends('layout.layout')

@section('contents')

<div class="form-group row add">
       <div class="form-group">
            <div class="col-md-2" >
                 <a href="addItem" class ="btn btn-info">Add New</a>
            </div>
       </div>
               
</div>

<div class="task-content">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-borderless" id ="table">
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Action</th>
                </tr>
                {{ csrf_field() }}

                <?php $no=1; ?>
                @foreach ($catatan as $note)
                    <tr class="item{{$note->id}}">
                        <td>{{$no++}}</td>
                        <td>{{($note->title)}}</td>
                        <td>{{$note->body}}</td>
                        <td>
                            <button class="edit-modal btn btn-primary" data-id ="{{$note->id}}" data-title ="{{$note->title}}" data-body ="{{$note->body}}"><span class="glyphicon glyphicon-edit"></span> &nbsp; &nbsp; Edit</button>
                            <button class="delete-modal btn btn-danger" data-id ="{{$note->id}}"><span class="glyphicon glyphicon-trash"></span>&nbsp; &nbsp;Delete</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>          
    </div>

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
                                        <input type="text"  name ="id" class="form-control" id="nid" disabled>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="title" class="control-label col-sm-2">Title : </label>
                                    <div class="col-sm-10">
                                        <input type="name" name="title" class="form-control" id="title">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="body" class="control-label col-sm-2">Body : </label>
                                    <div class="col-sm-10">
                                        <input type="name" name ="body" class="form-control" id="isi">
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
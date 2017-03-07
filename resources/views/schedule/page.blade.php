 @extends('layout.layout')

@section('contents')

<div class="form-group row add">
       <div class="form-group">
            <div class="col-md-2" >
                 <a href="add" class ="btn btn-info">Add New</a>
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
                    <th>Strart</th>
                    <th>End</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
                {{ csrf_field() }}

                <?php $no=1; ?>
                @foreach ($jadwal as $schedule)
                    <tr class="item{{$schedule->id}}">
                        <td>{{$no++}}</td>
                        <td>{{($schedule->title)}}</td>
                        <td>{{$schedule->start}}</td>
                        <td>{{$schedule->ends}}</td>
                        <td>{{$schedule->note}}</td>
                        <td>
                            <button class="edit-modal btn btn-primary" data-id ="{{$schedule->id}}" data-title ="{{$schedule->title}}" data-start ="{{$schedule->start}}" data-ends ="{{$schedule->ends}}" data-note="{{$schedule->note}}"><span class="glyphicon glyphicon-edit"></span> &nbsp; &nbsp; Edit</button>
                            <button class="delete-modal btn btn-danger" data-id ="{{$schedule->id}}" data-title ="{{$schedule->title}}" data-start ="{{$schedule->start}}" data-ends ="{{$schedule->ends}}" data-note="{{$schedule->note}}"><span class="glyphicon glyphicon-trash"></span>&nbsp; &nbsp;Delete</button>
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
                                        <input type="text"  name ="id" class="form-control" id="sid" disabled>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="title" class="control-label col-sm-2">Title : </label>
                                    <div class="col-sm-10">
                                        <input type="name" name="title" class="form-control" id="judul">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="start" class="control-label col-sm-2">Start : </label>
                                    <div class="col-sm-10">
                                        <input type="name" name ="start" class="form-control" id="start">
                                    </div>
                                  </div>

                                
                                  <div class="form-group">
                                    <label for="ends" class="control-label col-sm-2">End : </label>
                                    <div class="col-sm-10">
                                        <input type="text" name ="ends" class="form-control" id="ends">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="note" class="control-label col-sm-2">Note : </label>
                                    <div class="col-sm-10">
                                        <input type="text" name ="note" class="form-control" id="note">
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
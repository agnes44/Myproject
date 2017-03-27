 @extends('layout.desain')

@section('kontent')

 <nav class="navbar navbar-default">
         <div class="container-fluid">
         <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                 </button>
              </div>

         <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/create_event">Add New Event <span class="sr-only">(current)</span></a></li>
                    {{-- <li><a href="coba">FullCalendar</a></li> --}}
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

<div class="task-content">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-borderless" id ="table">
                <tr>
                    <th>No.</th>
                    <th>Event's Title</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Color</th>
                    <th>Action</th>
                </tr>
                {{ csrf_field() }}

                <?php $no=1; ?>
                @foreach ($adminevent as $event)
                    <tr class="item{{$event->id}}">
                        <td>{{$no++}}</td>
                        <td>{{($event->title)}}</td>
                        <td>{{$event->start}}</td>
                        <td>{{$event->end}}</td>
                        <td>{{$event->color}}</td>
                        <td>
                        <a href="{{'/adminevent/'.$event->id.'/edit'}}">
                             <button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp; &nbsp; Edit</button>
                        </a>
                             {{csrf_field()}}
                             {{method_field('DELETE')}}
                            <button class="delete-modal btn btn-danger" data-id ="{{$event->id}}"><span class="glyphicon glyphicon-trash"></span>&nbsp; &nbsp;Delete</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>          
    </div>      
</div>

<div id='calendar'></div> 

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
@stop
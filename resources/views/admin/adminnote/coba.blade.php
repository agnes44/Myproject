<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <p></p>
    <div class="container">
    <p></p>
        <button class="btn btn-primary" data-toggle ="modal" data-target ="#addData">Insert Data Note</button>
        <!-- Modal -->
        <div class="modal fade" id ="addData" tabindex="-1" role ="dialog" aria-labelledby ="addLabel">
            <div class="model-dialog" role ="document">
                <div class="modal-content" style="width: 500px; margin : 0 auto;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss ="modal" aria-label ="close">
                            <span aria-hidden ="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="addLabel">Modal Title</h4>
                    </div>

                    <div class="modal-body">
                         <form class="form-horizontal" action="{{'/note/'.$item->id}}" method ="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                            <fieldset>
                                <input type="text" name ="title" placeholder="title" value ="{{$item->title}}"> <br \>
                                {{ ($errors -> has('title')) ? $errors->first('title') : ' ' }} <br \><br \>
                                <textarea name="body" id="" cols="40" rows="8" placeholder="isi....">{{$item->body}}</textarea> <br \>
                                {{ ($errors -> has('body')) ? $errors->first('body') : ' ' }} <br \><br \>
                                
                                <button type="submit" class ="btn btn-success">Submit</button>
                                   
                            </fieldset>
                         </form>
                    </div>

                    <div class="modal-footer">
                        <button type ="button" class="btn btn-default" data-dismiss ="modal">Close</button>
                        <button type="button" class="btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    <p></p>
    </div>

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min (2).js " type="text/javascript"></script>
</body>
</html>






 @extends('layout.layout')

@section('contents')
<div class="task-content">
    <div class="form-group row add">
        <div class="col-md-2">
            <input type="text" class ="form-control" id ="title" name ="title" placeholder="title" required="required">
            {{ ($errors -> has('title')) ? $errors->first('title') : ' ' }}
        </div>
            
        <br \><br \><br \><br \>

        <div class="form-group">
            <div class="col-md-5">
                <input type="text" class ="form-control" id ="body" name ="body" placeholder="Your body here" required="required">
                {{ ($errors -> has('body')) ? $errors->first('body') : ' ' }} 
            </div>
         </div> 

      <div class="form-group">
        <div class="col-md-1" >
           <input type="date" name ="due_date"  id ="due_date" placeholder="" class="form-control">
                {{ ($errors -> has('due_date')) ? $errors->first('due_date') : ' ' }} <br \><br \>
        </div>
      </div>
    
    <form class="form-horizontal" action="/todo" method ="post">
    {{csrf_field()}}
    <button class ="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add New</button>
    </form>
    </div>
    <br \> <br \> 
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
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
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
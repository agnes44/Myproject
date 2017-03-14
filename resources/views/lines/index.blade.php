 @extends('layout.layout')

@section('contents')
<div class="form-group row add">
       <div class="form-group">
            <div class="col-md-2" >
                 <a href="#" class ="btn btn-info">Add New</a>
            </div>
       </div>          
</div>
<div class="task-content">
<div class="row">
  <div class="span3">
    <div class="well">
        <div>
            <ul class="nav nav-list">
                <li>
                    <label class="tree-toggle nav-header">
                        @foreach ($baris as $outlines)
                            <div class="outlines-title">
                                <h4>{{($outlines->body)}}</h4>
                            </div>
                    </label>
                    <ul class="nav nav-list tree">
                        <li><a href="#">JavaScript</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><label class="tree-toggle nav-header">Buttons</label>
                            <ul class="nav nav-list tree">
                                <li><a href="#">Colors</a></li>
                                <li><a href="#">Sizes</a></li>
                                <li><label class="tree-toggle nav-header">Forms</label>
                                    <ul class="nav nav-list tree">
                                        <li><a href="#">Horizontal</a></li>
                                        <li><a href="#">Vertical</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                     @endforeach
                </li>
            </ul>
        </div>
    </div>
    </div>
</div>
</div>
@stop
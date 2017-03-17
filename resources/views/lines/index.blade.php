 @extends('layout.layout')

 @section('contents')
 <a href="/tambahdata" class ="btn btn-info">Create outlines</a> <br \><br \>

<div class="row">
    <div class="span3">
        <div class="well">
            <ul class="nav nav-list">
                <li>
                @foreach ($ide as $outlines)
                    <label class="tree-toggle nav-header">
                            {{($outlines->id)}}
                    </label>
                     <ul class="nav nav-list tree">
                         @foreach (DB::table('lines')->where('id_outlines', $outlines->id)->get() as $baris)
                            <li>{{ $baris->title }}</li>
                        @endforeach
                        
                        {{-- <li><label class="tree-toggle nav-header">Buttons</label>
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
                        </li> --}}
                    </ul>
                @endforeach
                </li>
            </ul>
        </div>
    </div>
</div>
@stop
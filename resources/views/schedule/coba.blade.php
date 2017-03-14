@extends('layout.layout')

@section('contents')
<div class="task-title">
    <h3>Full calendar</h3>
    {{-- {{ Form::open(['route' => 'events.store', 'method' => 'post', 'role' => 'form']) }}
        <div id="responsive-modal" class="modal fade" tabindex="-1" data-backdrop ="static">
            <div class="modal-dialog">
             <div class="modal-content">
                    <div class="header">
                        <h4>Tambah Data Event</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('date_start', 'Date Start') }}
                            {{ Form::text('date_start', old('date_start'), ['class' => 'form-control', 'readonly' => 'true']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('time_start', 'Time Start') }}
                            {{ Form::text('time_start', old('time_start'), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('date_end', 'Date End') }}
                            {{ Form::text('date_end', old('date_end'), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('color', 'COLOR') }}
                            <div class="input-group colorpicker">
                                {{ Form::text('color', old('color'), ['class' => 'form-control']) }}
                                <span class ="input-group-addon">
                                    <i></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type ="button" class="btn btn-default" data-dismiss ="modal">Cancel</button>
                        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
            </div>
        </div>
    {{ Form::close() }} --}}
    <div id='calendar'></div>        
</div>
@stop
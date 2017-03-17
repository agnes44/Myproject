@section('contents')
<a href="/task" class ="btn btn-info">Back</a>
<div class="col-lg-4 col-lg-offset-4">
    <h3>Edit</h3>
        <form class="form-horizontal" action="{{'/todo/'.$todo->id}}" method ="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
            <fieldset>
                <input type="text" name ="title" placeholder="title" value ="{{$todo->title}}"> <br \>
                {{ ($errors -> has('title')) ? $errors->first('title') : ' ' }} <br \><br \>
                <textarea name="body" id="" cols="40" rows="8" placeholder="isi....">{{$todo->body}}</textarea> <br \>
                {{ ($errors -> has('body')) ? $errors->first('body') : ' ' }} <br \><br \>

                <button type="submit" class ="btn btn-success">Submit</button>   
            </fieldset>
        </form>
</div>
@endsection
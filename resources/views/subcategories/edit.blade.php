<div class="subcategories">

    {!! Form::model($subcategories, ['route' => ['subcategories.update', $subcategories->id], 'method' => 'PATCH']) !!}

    {{ Form::label('', "" )}}
    {{ Form::textarea('subcategories', null )}}

    {{ Form::submit('Veranderingen opslaan', ['class' => 'btn btn-dark'] )}}

    {!! Form::close() !!}

    <a class="btn btn-dark" href="{{url("")}}">Ga terug</a>
</div>


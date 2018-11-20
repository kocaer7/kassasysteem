<div class="subcategories">
    <p class="lead">{{ $subcategories->subcategories }}</p>

    {!! Html::linkRoute('subcategories.edit', 'Edit', array($subcategories->id), ['class' => 'btn btn-dark']) !!}

    {!! Form::open(['route' => ['subcategories.destroy', $subcategories->id], 'method' => 'DELETE']) !!}
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

    <a class="btn btn-dark" href="{{url("/subcategories ")}}">Ga terug</a>
</div>


<div class="products">

    {!! Form::model($products, ['route' => ['products.update', $products->id], 'method' => 'PATCH']) !!}

    {{ Form::label('', "" )}}
    {{ Form::textarea('name', null )}}

    {{ Form::label('', "" )}}
    {{ Form::textarea('category', null )}}

    {{ Form::label('', "" )}}
    {{ Form::textarea('subcategory', null )}}

    {{ Form::label('', "" )}}
    {{ Form::number('price', null )}}

    {{ Form::label('', "" )}}
    {{ Form::number('cost', null )}}
    <br>

    {{ Form::submit('Save Changes', ['class' => 'btn btn-dark'] )}}

    {!! Form::close() !!}

    <a class="btn btn-dark" href="{{url("")}}">Go back</a>
</div>


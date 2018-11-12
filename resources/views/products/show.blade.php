<div class="products">
    <p class="lead">{{ $products->name }}</p>

    {!! Html::linkRoute('products.edit', 'Edit', array($products->id), ['class' => 'btn btn-dark']) !!}

    {!! Form::open(['route' => ['products.destroy', $products->id], 'method' => 'DELETE']) !!}
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

    <a class="btn btn-dark" href="{{url("/products ")}}">Go back</a>
</div>
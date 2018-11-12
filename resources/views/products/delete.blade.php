{!! Form::open(['route' => ['products.destroy', $products->id], 'method' => 'DELETE']) !!}
{!! Form::submit('Delete') !!}
{!! Form::close !!}
{!! Form::open(['route' => ['subcategories.destroy', $subcategories->id], 'method' => 'DELETE']) !!}
{!! Form::submit('Delete') !!}
{!! Form::close !!}
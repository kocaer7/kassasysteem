@extends('layout')
@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        @if($message = Session::get('danger'))
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
            @endif
        @foreach($products as $product)
            <form action="{{ action('ProductController@update', $product->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label>Verkoopprijs</label>
                    <input type="text" name="verkoopprijs" class="form-control" value="{{ $product->verkoopprijs }}">
                </div>
                <div class="form-group">
                    <label>Inkoopprijs</label>
                    <input type="text" name="inkoopprijs" class="form-control" value="{{ $product->inkoopprijs }}">
                </div>
                <button type="submit" class="btn btn-dark">Opslaan</button>
                <a href="{{ action('ProductController@index') }}" class="btn btn-light">Terug</a>
            </form>
            @endforeach
    </div>
</div>
@endsection
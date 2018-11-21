@extends('layout')
@section('content')

    <div class="row">
        <div class="col-md-6, offset-md-3">
            @if($message = Session::get('danger'))
                <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            <form action="{{ action('ProductController@store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Name"/>
                </div>
                <div class="form-group">
                    <label>Verkoopprijs</label>
                    <input class="form-control" type="text" name="verkoopprijs" placeholder="Verkoopprijs"/>
                </div>
                <div class="form-group">
                    <label>Inkoopprijs</label>
                    <input class="form-control" type="text" name="inkoopprijs" placeholder="Inkoopprijs"/>
                </div>
                <button class="btn btn-dark" type="submit">Submit</button>
                <a href="{{action('ProductController@index')}}" class="btn btn-light">Alle Producten</a>
            </form>
        </div>
    </div>
    @endsection
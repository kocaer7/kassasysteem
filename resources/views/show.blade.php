@extends('layout')
@section('content')
        @foreach($products as $product)
            <div class="container">
                <h2>Product.</h2>
                <p>{{$product->name}}</p>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Productnaam</th>
                        <th>Verkoopprijs</th>
                        <th>Inkoopprijs</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->verkoopprijs}}</td>
                        <td>{{$product->inkoopprijs}}</td>
                    </tr>
                    </tbody>
                </table>
                <a href="{{action('ProductController@index')}}" class="btn btn-light">Alle Producten</a>
            </div>
    @endforeach
@endsection
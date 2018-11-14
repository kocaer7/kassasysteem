@extends('layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
           <table>
               <div class="container">
                    <div class="float-right"> <a href="{{ action('ProductController@create') }}" class="btn btn-dark">Nieuw Product</a></div>
                    <div class="col-md-4 float-lg-right">
                        <form role="search" method="GET" action="{{url("/search")}}">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control">
                                <span class="input-group-prepend">
                                    <button type="submit" class="btn btn-light">Zoeken</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <h2 style="font-weight: bold; font-family:'Helvetica'">Productenlijst.</h2>
                    <p>Alle producten.</p>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Productnaam</th>
                            <th>Verkoopprijs</th>
                            <th>Inkoopprijs</th>
                            <th>Actie</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->verkoopprijs}}</td>
                            <td>{{$product->inkoopprijs}}</td>
                            <td>
                                <form action="{{ action('ProductController@destroy', $product->id) }}" method="post">
                                    <a href="{{ action('ProductController@show', $product->id)  }}" class="btn btn-light">Bekijken</a>
                                    <a href="{{ action('ProductController@edit', $product->id)  }}" class="btn btn-light">Bewerken</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
           </table>
        </tbody>

@endsection
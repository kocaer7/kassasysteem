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
            {{ $products->links() }}
        </div>
    </table>

    <div class="wrapper">
        <section id="cart">
            <span class="cart-title"><i class="fa fa-shopping-cart fa-fw"><span class="cart-counter">0</span></i>Cart</span>
            <article class="cart-total">
                <span class="product-price"><i class="fa fa-rub fa-fw"></i><b>0</b>-</span>
                <button class="button order">Order</button>
            </article>
            <div class="close"><i class="fa fa-times fa-fw"></i></div>
        </section>

        <section id="catalog">
            @foreach($products as $product)
                <article class="product" data-product-id="1">
                    <div class="product-info">
                        <span class="product-id">{{$product->id}}</span>
                        <span class="product-brand">{{$product->name}}</span>
                        <span class="product-price"><i class="fa fa-rub fa-fw"></i>{{$product->verkoopprijs}}</span>
                        <button class="add-cart button">Kopen</button>
                    </div>
                </article>
            @endforeach
        </section>
    </div>

    <script>
        $(document).ready(function() {
            var fns = {},
                productData = {},
                cartCounter = 0,
                cartTotal = 0,
                productCounter = 1,
                timer = '',
                addCart = $('.add-cart'),
                deleteCart = $('.cart-product-delete');

            fns.getProductData = function(a){
                var p = a.closest('.product');
                productData.id = p.data('{{$product->id}}');
                productData.id = parseInt(productData.id);
                productData.brand = p.find('.product-brand').text();
                productData.price = p.find('.product-price').text();
                productData.price = parseInt(productData.price);
                console.log('id: '            + productData.id +

                    '\n brand: '       + productData.brand +
                    '\n price: '       + productData.price);
            };

            fns.changeCart = function(){
                var counter = $('.cart-counter'),
                    total = $('.cart-total').find('.product-price b');
                counter.text(cartCounter);
                total.text(cartTotal);
            };

            fns.hideCart = function(cart){
                var width = cart.width();
                cart.animate({'right' : -width});
                setTimeout(function(){
                    cart.removeAttr('class');
                    cart.removeAttr('style');
                    timer = '';
                }, 1000);
            };

            fns.cartTimer = function(cart) {
                timer = setTimeout(function () {
                    fns.hideCart(cart)
                }, 3000);
            };

            fns.showCart = function(cart){
                var show = cart.hasClass('show');
                if(show) {
                    return false;
                } else {
                    cart.addClass('show');
                    cart.animate({'right' : 0});
                    if(timer == '') {
                        fns.cartTimer(cart);
                    }
                }
            };

            fns.addToCard = function(){
                var pattern = "<article class='cart-product' data-cart-product-id='" + productData.id + "' data-cart-product-counter='" + productCounter + "'>\n<div class='cart-product-img'><img src=" + productData.img + " alt=''></div>\n<div class='cart-product-info'>\n<span class='product-brand'>" + productData.brand + "</span></div>\n<div class='cart-product-footer'>\n<span class='product-price'><i class='fa fa-rub fa-fw'></i><b>" + productData.price  + "</b>-</span><a href='#' class='cart-product-delete'><i class='fa fa-trash-o fa-fw'></i></a>\n</div>\n</article>",
                    cart = $('#cart'),
                    cartProducts = cart.find('.cart-product'),
                    cartItem;

                if(cartProducts.length > 0) {
                    for(var i = 0; i < cartProducts.length; i++) {
                        console.log("i: " + i);
                        if(cartProducts.eq(i).data('cart-product-id') != productData.id) {
                            console.log("data: " + cartProducts.eq(i).data('cart-product-id') + " id: " + productData.id);
                            if(i == cartProducts.length - 1) {
                                $(pattern).insertBefore(cart.find('.cart-total'));
                                cartProducts = cart.find('.cart-product');
                                break;
                            }
                        } else {
                            cartItem = i;
                            var cartProductPrice = cartProducts.eq(cartItem).find('.cart-product-footer .product-price b'),
                                price = cartProductPrice.text();
                            price = parseInt(price);
                            price += productData.price;
                            cartProductPrice.text(price);
                            break;
                        }
                    }
                } else {
                    $(pattern).insertBefore(cart.find('.cart-total'));
                    cartProducts = cart.find('.cart-product');
                }

                cartCounter++;
                cartTotal += productData.price;
                fns.changeCart();
                fns.showCart(cart);
            };

            addCart.on('click', function(){
                var _THIS = $(this);
                fns.getProductData(_THIS);
                fns.addToCard();
            });

            deleteCart.on('click', function(e){
                e = event || window.event;
                e.preventDefault();
                var id = $(this).closest('.cart-product').data('cart-product-id');
                console.log($(this));
            });

        });
    </script>



@endsection
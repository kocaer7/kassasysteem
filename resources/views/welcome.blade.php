<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kassa</title>



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/scss/kassa.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth

                    @else
                        <a href="{{ route('login') }}">Login</a>

                    @endauth

                </div>
            @endif

                <form name="calculator">
                    <div class="container__grid grid">
                            <p id="display" >0.00 Euro</p>

                            <div class="grid__item grid__output"><label><input type="text" name="display" id="display" disabled></label></div>
                            @foreach ($products AS $key => $product)

                                {{$product->name}}

                            <div class="grid__item grid__{{$key}}"><input type="button" name="one" value="{{$product->verkoopprijs}}" onclick="calculator.display.value += '{{$product->verkoopprijs}}'"></div>
                        @endforeach

                                <div class="grid__item grid__clear"><input style=""  type="button" id="clear" name="clear" value="c" onclick="calculator.display.value = ''"></div>

                    </div>
                </form>
        </div>
<script>
    // initialize array
    var arr = [ "@foreach ($products as $product)
            {{$product->name}}
            @endforeach"
    ];

    // append multiple values to the array
    arr.push("Salut", "Hey");

    // display all values
    for (var i = 0; i < arr.length; i++) {
        console.log(arr[i]);
    }
</script>



    </body>
</html>

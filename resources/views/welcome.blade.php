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
                    <p style="font-size: 50px;">0.00 Euro</p>
                </div>
            @endif

                <form name="calculator">
                    <div class="container__grid grid">


                        <div class="grid__item grid__output"><input type="text" name="display" id="display" disabled></div>
                        @foreach ($products AS $key => $product)
                            {{$product->id}}
                            <div class="grid__item grid__{{$key}}}}"><input type="button" name="one" value="<?php ?>" onclick="calculator.display.value += '1'"></div>
                        @endforeach
                                <div class="grid__item grid__one"><input type="button" name="one" value="<?php ?>" onclick="calculator.display.value += '1'"></div>
                                <div class="grid__item grid__two"><input type="button" name="two" value="2" onclick="calculator.display.value += '2'"></div>
                                <div class="grid__item grid__three"><input type="button" name="three" value="3" onclick="calculator.display.value += '3'"></div>
                                <div class="grid__item grid__plus"><input type="button" class="operator" name="plus" value="+" onclick="calculator.display.value += '+'"></div>



                                <div class="grid__item grid__four"><input type="button" name="four" value="4" onclick="calculator.display.value += '4'"></div>
                                <div class="grid__item grid__five"><input type="button" name="five" value="5" onclick="calculator.display.value += '5'"></div>
                                <div class="grid__item grid__six"><input type="button" name="six" value="6" onclick="calculator.display.value += '6'"></div>
                                <div class="grid__item grid__minus"><input type="button" class="operator" name="minus" value="-" onclick="calculator.display.value += '-'"></div>

                                <div class="grid__item grid__seven"><input  type="button" name="seven" value="7" onclick="calculator.display.value += '7'"></div>
                        <div class="grid__item grid__eight"><input  type="button" name="eight" value="8" onclick="calculator.display.value += '8'"></div>
                                <div class="grid__item grid__nine"><input type="button" name="nine" value="9" onclick="calculator.display.value += '9'"></div>
                                <div class="grid__item grid__multiplied"><input  type="button" class="operator" name="times" value="x" onclick="calculator.display.value += '*'"></div>

                                <div class="grid__item grid__clear"><input style=""  type="button" id="clear" name="clear" value="c" onclick="calculator.display.value = ''"></div>
                                <div class="grid__item grid__zero"><input type="button" name="zero" value="0" onclick="calculator.display.value += '0'"></div>
                        <div class="grid__item grid__equals"><input type="button" name="doit" value="=" onclick="calculator.display.value = eval(calculator.display.value)"></div>
                                <div class="grid__item grid__divided"><input type="button" class="operator" name="div" value="/" onclick="calculator.display.value += '/'"></div>

                    </div>
                </form>
        </div>






    </body>
</html>

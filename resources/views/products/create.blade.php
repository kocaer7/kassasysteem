<div class="products">

    <h1 style="font-weight: bold; font-family: 'ITC Avant Garde Gothic LT';" class="title">Prodcuten</h1>


    <div id="create-product">
        {!! Form::open(['route' => 'products.store']) !!}

        {{Form::label('')}}
        {{Form::text('name', null, ['placeholder' => 'Naam'])}}
        <br>

        {{Form::label('')}}
        {{Form::text('category', null, ['placeholder' => 'Categorie'])}}
        <br>

        {{Form::label('')}}
        {{Form::text('subcategory', null, ['placeholder' => 'Sub-Categorië'])}}
        <br>

        {{Form::label('')}}
        {{Form::number('sellingprice', null, ['placeholder' => 'Verkoopprijs', 'step'=>'any'])}}
        <br>

        {{Form::label('')}}
        {{Form::number('cost', null, ['placeholder' => 'Inkoopprijs', 'step'=>'any'])}}
        <br>

        {{Form::submit('Product Aanmaken', ['class' => 'btn btn-dark'])}}

        {{Form::close() }}
        <br>

        <a href="products"><button class="btn-dark">Alle producten bekijken</button></a>

    </div>
</div>


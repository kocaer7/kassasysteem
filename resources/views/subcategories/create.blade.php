<div class="subcategories">

    <h1 style="font-weight: bold; font-family: 'ITC Avant Garde Gothic LT';" class="title">Sub-Categorieën</h1>


    <div id="create-subcategory">
        {!! Form::open(['route' => 'subcategories.store']) !!}

        {{Form::label('')}}
        {{Form::text('subcategories', null, ['placeholder' => 'Sub-Categorië'])}}
        <br>


        {{Form::submit('Sub-Categorië aanmaken', ['class' => 'btn btn-dark'])}}

        {{Form::close() }}
        <br>

        <a href="subcategories"><button class="btn-dark">Alle sub-categorieën bekijken</button></a>

    </div>
</div>


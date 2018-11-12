<div>
    <table class="table table-striped">
        <thead>

        </thead>
        <tbody>
        @foreach($products as $products)
            <tr>

                <td><div id="viewProductName">
                        {{$products->name}}
                    </div></td>

                <td>
                    <div id="viewProductCategory">
                        {{$products->category}}
                    </div></td>

                <td><div id="viewProductSubCategory">
                        {{$products->subcategory}}
                    </div></td>

                <td><div id="viewProductPrice">
                        {{$products->sellingprice}}
                    </div></td>

                <td><div id="viewProductCost">
                        {{$products->cost}}
                    </div></td>


                <td>
                    <a class="btn btn-dark" href="{{url("products/" . $products->id)}}">View Product</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div>
    <table class="table table-striped">
        <thead>

        </thead>
        <tbody>
        @foreach($subcategories as $subcategories)
            <tr>

                <td><div id="viewSubcategories">
                        {{$subcategories->subcategories}}
                    </div></td>

                <td>


                <td>
                    <a class="btn btn-dark" href="{{url("subcategories/" . $subcategories->id)}}">Sub-Categorieë bekijken</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

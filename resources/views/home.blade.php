@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin panel</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="alert alert-success">
                            You are logged in as Admin
                        </div>
                        <div class="adminNav">

                            <div class="grid-container">
                                <div class="grid-item"><a href="{!! url('admin/adminIndex')!!}" class="btn btn-primary">Admin</a></div>
                                <div class="grid-item"><a href="{!! url('products/aboutIndex')!!}" class="btn btn-primary">Products</a></div>
                                                </div>
                            <hr>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

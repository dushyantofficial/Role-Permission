@extends('layouts.app')


@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-eye"></i>Show Products</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine"
                   href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
        <div class="row card">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong style="color: red">Name:</strong>
                        <label class="badge badge-success">{{ $product->name }}</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong style="color: red">Details:</strong><br>
                        {{ $product->detail }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
{{--<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>--}}

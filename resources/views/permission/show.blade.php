@extends('layouts.app')


@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-eye"></i>Show Products</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
        <div class="row card">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong style="color: red">Name:</strong>
                        {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong style="color: red">Details:</strong>
                {{ $product->detail }}
            </div>
        </div>
            </div>
        </div>
    </main>
@endsection
{{--<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>--}}

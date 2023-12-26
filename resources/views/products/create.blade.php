@extends('layouts.app')


@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i>Add New Product</h1>
            </div>
        </div>


        <form action="{{ route('products.store') }}" method="POST">
            @csrf


            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title"></h3>
                        <div class="tile-body">
                            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data"
                                  id="upload_pdf">
                            @csrf


                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input name="name" type="text" value="{{old('name')}}"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="oldPasswordInput"
                                           placeholder="Enter Full Name">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Detail</label>

                                    <textarea name="detail" type="text"
                                              class="form-control @error('detail') is-invalid @enderror"
                                              placeholder="Enter Detail">{{old('detail')}}</textarea>
                                    @error('detail')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>


                        </div>

                        <br>


                        <button type="submit" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Add
                        </button>
                        <a href="{{route('products.index')}}"
                           class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine">Back</a>
                    </div>
                </div>
            </div>
        </form>
    </main>



    {{--    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>--}}
@endsection

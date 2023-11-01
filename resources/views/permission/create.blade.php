@extends('layouts.app')


@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i>Add New Permission</h1>
            </div>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title"></h3>
                        <div class="tile-body">
                            <form action="{{route('permission.store')}}" method="POST" enctype="multipart/form-data"
                                  id="upload_pdf">
                            @csrf


                        </div>
                        <div class="row">
                            <div class="col-12">
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

                        </div>

                        <br>


                        <button type="submit" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Add</button>
                        <a href="{{route('permission.index')}}" class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine">Back</a>
                    </div>
                </div>
            </div>
        </form>
    </main>



    {{--    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>--}}
@endsection

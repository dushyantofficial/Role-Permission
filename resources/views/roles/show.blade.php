@extends('layouts.app')


@section('content')

    <main class="app-content {{user_theme_get()}}">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-eye"></i>Show Role</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine"
                   href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>

        <div class="row card">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="color: red">Name:</strong>
                    <label class="badge badge-success">{{ $role->name }}</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    @php
                        // Generate a random color in hexadecimal format
                        $randomColor = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                    @endphp
                    <strong style="color: red">Permissions:</strong><br>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $index =>$permission)
                            <label class="badge"
                                   style="background-color: {{$randomColor}}">{{ $permission->name }}</label>
                            @if(($index + 1) % 6 == 0)
                                <br>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

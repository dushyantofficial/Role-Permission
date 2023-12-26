@extends('layouts.app')


@section('content')

    <main class="app-content {{user_theme_get()}}">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-eye"></i>Show User</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine"
                   href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
        <div class="row card">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="color: red">Name:</strong>
                    {{ $user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="color: red">Email:</strong>
                    {{ $user->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="color: red">Roles:</strong>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

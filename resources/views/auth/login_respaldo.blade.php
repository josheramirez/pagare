@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 col-form-label">Username</label>

                                <div class="col-md-8">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 col-form-label">Password</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 ml-auto">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Login</button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
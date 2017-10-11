@extends('layouts.back.default')

@section('content')

<div class="col-md-6 offset-md-3">
    <div class="card">
        <div class="card-header text-center">
            <h4>Log In</h4>
        </div>
        <div class="card-body p-4">
            <form role="form" method="POST" action="{{ route('admin.login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-6 control-label">Email</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-6 control-label">Password</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">
                            Login <i class="ionicons ion-ios-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection

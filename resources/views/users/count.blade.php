
@extends('layouts.app')



@section('content')

<div class="container-login">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.Count') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/user/count/' . Auth::user()->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('auth.Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" placeholder="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="{{ Auth::user()->email }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('auth.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" value="editUser">
                                    {{ __('auth.Edit') }}
                                </button>
                                <a href="{{ route('deleteUser') }}">
                                    <button type="button" class="btn btn-danger" value="deleteUser">
                                    {{ __('auth.Delete') }}
                                </button></a>

                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>




@endsection


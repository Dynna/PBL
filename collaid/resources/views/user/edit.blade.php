@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update') }}">
                            @csrf

                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{session('success')}}
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" value="{{$user['first_name']}}" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name">

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" value="{{$user['last_name']}}" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name">

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" value="{{$user['email']}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" value="{{$user['date_of_birth']}}" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth">

                                    @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="provided_service" class="col-md-4 col-form-label text-md-right">{{ __('Main job you offer') }}</label>

                                <div class="col-md-6">
                                    <input id="provided_service" value="{{$user['provided_service']}}" type="text" class="form-control @error('provided_service') is-invalid @enderror" name="provided_service">

                                    @error('provided_service')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="past_experience" class="col-md-4 col-form-label text-md-right">{{ __('Past experience') }}</label>

                                <div class="col-md-6">
                                    <input id="past_experience" value="{{$user['past_experience']}}" type="text" class="form-control @error('past_experience') is-invalid @enderror" name="past_experience">

                                    @error('past_experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update profile') }}
                                    </button>
                                </div>
                            </div>
                            <a href="{{ route('password.edit', Auth::user()->id) }}">Change Password</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

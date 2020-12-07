@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add profile picture') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('avatar.update') }}" enctype="multipart/form-data">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <input type="file" class="form-control-file" name="avatar" id="avatar" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                            </div>

                            <div class="row justify-content-center">
                                <div class="profile-header-container">
                                    <div class="profile-header-img">
                                      {{--  <img class="rounded-circle" src="/public/avatars/{{ $user['avatar'] }}" />--}}
                                        <!-- badge -->
                                        <div class="rank-label-container">
                                          {{--  <span class="label label-default rank-label">{{$user['first_name']}}</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save photo') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

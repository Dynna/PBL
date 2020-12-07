@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$user['first_name']}} {{$user['last_name']}}</h1>
        <p>{{$user['email']}}</p>
        <p>{{$user['date_of_birth']}}</p>
        <p>{{$user['provided_service']}}</p>
        <p>{{$user['past_experience']}}</p>
        <img src="{{asset(Auth::user()->avatar)}}" alt="">
        <br>
        <a href="{{ route('user.edit', Auth::user()->id) }}">Edit profile</a>
    </div>
@endsection
<script type="text/javascript">
    document.title = `{{$user['first_name']}}'s profile`
</script>

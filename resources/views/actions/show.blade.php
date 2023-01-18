@extends('base')
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h1>Name: {{ $user->name }}</h1>
        </div>
        <img src="{{asset('storage/' . $user->picture)}}" alt="{{$user->picture}}" height="300" width="300">

        <div class="card-body">

            <p>
                <strong>Lastname: {{ $user->lastname }} </strong>
            </p>
            <p>
                Email: {{ $user->email }}
            </p>
            <p>Date of birthday: {{$user->dob}}</p>
            <p>Description: {{$user->description}}</p>
            <p>Sex: {{$user->sex}}</p>
            <p>State: {{$user->state}}</p>

        </div>
        <div class="container">
            <button type="submit" class="btn btn-warning " style="display: inline-block">
                <a href="{{action([App\Http\Controllers\UserController::class, 'index'])}}" class="text-dark">Back</a>
            </button>
            <form style="display: inline-block"
                  action="{{action([App\Http\Controllers\UserController::class, 'destroy'], ['user' => $user])}} "
                  method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-primary">
                    Delete
                </button>
            </form>
            <button style="display: inline-block" type="submit" class="btn btn-danger">
                <a href="{{action([App\Http\Controllers\UserController::class, 'edit'], ['user' => $user])}} "
                   class="text-dark">Update</a>
            </button>
        </div>


    </div>
@endsection



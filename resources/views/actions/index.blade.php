@extends('base')

@section('content')
    <div class="container p-3 bg-light">
        <h1>Users Accounting</h1>
        <p>
            <a href="{{action([App\Http\Controllers\UserController::class, 'create'])}}" class="btn btn-outline-primary">
                Create Article
            </a>
        </p>

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Picture</th>
                    <th scope="col">Name</th>
                    <th scope="col">lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date of birth</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            @if(!is_null($user->picture))
                            <img src="{{asset('storage/' . $user->picture)}}" alt="{{$user->picture}}" height="100" width="100">
                            @endif
                        </td>
                        <td>
                            <a href="{{
                                        action([\App\Http\Controllers\UserController::class, 'show'], ['user' => $user])
                                    }}">
                                {{$user->name}}
                            </a>
                        </td>
                        <td>
                            {{$user->lastname}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{$user->dob}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection



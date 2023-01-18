@extends('base')

@section('content')
    <div class="container p-5 m-5 bg-light">
        <div class="row">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            <form action="{{action([\App\Http\Controllers\UserController::class, 'store']) }}"
                        method="post" enctype="multipart/form-data">
                @csrf
                <h1 class="text-center text-center">Create User</h1>

                <div class="form-group">
                    <label for="author">Name</label><br/>
                    <input class="form-control my-2" type="text" name="name" id="name" value="{{old('name')}}"/>
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Lastname</label><br/>
                    <input class="form-control my-2" type="text" name="lastname" id="lastname" value="{{old('lastname')}}"/>
                    @error('lastname')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Email</label><br/>
                    <input class="form-control my-2" type="text" name="email" id="email" value="{{old('email')}}"/>
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Password</label><br/>
                    <input class="form-control my-2" type="text" name="password" id="password" value="{{old('password')}}"/>
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Description</label><br/>
                    <input class="form-control my-2" type="text" name="description" id="description" value="{{old('description')}}"/>
                    @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Url address</label><br/>
                    <input class="form-control my-2" type="text" name="url" id="url" value="{{old('url')}}"/>
                    @error('url')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Date</label><br/>
                    <input class="form-control my-2" type="text" name="dob" id="dob" value="{{old('dob')}}" placeholder="year-month-day"/>
                    @error('dob')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <input type="file" class="custom-file-input form-control" id="customFile" name="picture">
                    </div>
                </div>

                <div class="form-group m-3 text-center">
                    <fieldset class="d-inline-block">
                        <legend class="text-info my-2">Sex</legend>
                        <input type="radio" name="sex" id="sex" value="Male"/>
                        <label for="author">Male</label><br/>
                        <input type="radio" name="sex" id="sex" value="female"/>
                        <label for="author">female</label>
                        @error('sex')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </fieldset>
                    <fieldset class="d-inline-block">
                        <legend class="text-info my-2">Активность</legend>
                        <input type="radio" name="user_activity" id="user_activity" value="true"/>
                        <label for="author">Активен</label><br/>
                        <input type="radio" name="user_activity" id="user_activity" value="false"/>
                        <label for="author">Неактивен</label>
                        @error('user_activity')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </fieldset>
                </div>

                <div class="form-group mb-4">
                    <label for="author">State</label><br/>
                    <input class="form-control my-2" type="text" name="state" id="state" value="{{old('text')}}"/>
                    @error('state')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="d-block px-4 my-2 text-bg-dark" >Create</button>
            </form>
        </div>
        <a href="{{action([App\Http\Controllers\UserController::class, 'index'])}}" class=" my-3 d-inline-block px-5 text-bg-dark">Back</a>
    </div>
@endsection



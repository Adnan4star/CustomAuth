@extends('layouts.app');
@section('content');
    
    
 

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h1>Login</h1>

                    @if (Session::has('error'))
                        <p class="text-danger">{{ Session::get('error') }}</p>
                    @endif
                    @if (Session::has('success'))
                    <p class="text-success">{{ Session::get('success') }}</p>
                    @endif

                    <form method="POST" action="{{route('login')}}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" />
                            @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" />
                            @if($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-8 text-left">
                                <a href="#" class="btn btn-link">Forgot Password?</a>
                            </div>
                            <div class="col-4 text-right">
                                <input type="submit" class="btn btn-primary" value="Login" />
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
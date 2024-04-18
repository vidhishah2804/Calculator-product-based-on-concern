@extends('auth.layouts')
@section('content')

<style>
    body {
    background: url(../assets/images/Visual_Identity.png);
    background-repeat: no-repeat;
    background-position: right top;
}
.form-control {
    display: block;
    width: 100%;
    padding: 15px 20px;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    font-family: sans-serif;
    appearance: none;
    border-radius: 15px;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}
</style>
    <main class="login-form">
        <div class="container">
            <div class="row">
                <div class="col-md-6 loginbg">
                    <div class="">
                        <h3 class="text-center leg">Login</h3>
                        <div class="card-body ">
                            <form method="POST" action="{{ route('login.post') }}">
                                @csrf
                                <div class="form-group mb-5">
                                    <label>Username or Email Address</label>
                                    <input type="text"  id="email" class="form-control"
                                        name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-5">
                                <label>Password</label>
                                    <input type="password" id="password" class="form-control"
                                        name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="loginbutton">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

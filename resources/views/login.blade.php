@extends('layout.admin.app')
@section('title', 'Login')
@section('content')
    <section class="vh-100 d-flex align-items-center bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Image Section -->
                <div class="col-lg-6 mb-4 mb-lg-0 d-flex align-items-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid rounded" alt="Login illustration">
                </div>

                <!-- Form Section -->
                <div class="col-lg-5">
                    <div class="card shadow-sm border-0 rounded-4 p-4">
                        <h3 class="text-center mb-4">Login</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control form-control-lg"
                                    placeholder="Enter your email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg"
                                    placeholder="Enter your password" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <a href="#" class="small text-decoration-none">Forgot password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2">Login</button>

                            <p class="text-center mt-3 mb-0">
                                Don't have an account?
                                <a href="{{ route('register') }}" class="text-primary fw-semibold">Register</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

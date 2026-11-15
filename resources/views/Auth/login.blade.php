
@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 85vh;">

    <div class="card shadow-sm border-0"
         style="width: 420px;">

        <div class="card-body p-4">

            <div class="text-center mb-4">
                <h3 class="text-success fw-bold">Plant Nursery</h3>
                <p class="text-muted">Inventory Management System</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email </label>

                    <input type="text"
                           name="login"
                           class="form-control"
                           value="{{ old('login') }}"
                           placeholder="Enter email"
                           required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Enter password"
                           required>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox"
                           name="remember"
                           class="form-check-input"
                           id="remember">

                    <label for="remember" class="form-check-label">
                        Remember me
                    </label>
                </div>

                <button class="btn btn-success w-100">
                    Login
                </button>
            </form>
<div class="text-center mt-4">
    <p class="text-muted mb-1">Don't have an account?</p>

    <a href="{{ route('register') }}"
       class="text-success fw-bold text-decoration-none">
        Register here
    </a>
</div>
        </div>
    </div>
</div>

@endsection

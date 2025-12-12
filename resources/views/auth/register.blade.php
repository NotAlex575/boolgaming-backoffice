@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white d-flex align-items-center">
                    <i class="bi bi-person-plus fs-4 me-2"></i>
                    <span class="fw-semibold">{{ __('Register') }}</span>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text"
                                   class="form-control form-control-lg @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autofocus>

                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email"
                                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required>

                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control form-control-lg @error('password') is-invalid @enderror"
                                   name="password" required>

                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password"
                                   class="form-control form-control-lg"
                                   name="password_confirmation" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success btn-lg px-4">
                                {{ __('Register') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

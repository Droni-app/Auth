@extends('layouts.app')

@section('content')
<div class="container mx-auto">
  <div class="bg-white p-8 rounded shadow-md w-96 mx-auto my-10">
    <h2 class="text-2xl font-bold mb-6">Iniciar sesión</h2>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-bold mb-2">
          Correo electrónico:
        </label>
        <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
          <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña:</label>
        <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" placeholder="Introduce tu contraseña" required>
        @error('password')
          <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-6 flex items-center">
        <input type="checkbox" id="remember" name="remember" class="mr-2" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember" class="text-gray-700">Recordarme en este equipo</label>
      </div>
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Iniciar sesión
        </button>
        <a href="{{ route('password.request') }}"
          class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
          ¿Olvidaste tu contraseña?
        </a>
      </div>
    </form>
  </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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

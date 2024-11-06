@extends('layout.template')

@section('content')
    <form action="{{ route('login.auth') }}" class="card p-5" method="POST" style="max-width: 400px; margin: auto; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px; background-color: #fff;">
        @csrf
        @if (Session::get('failed'))
            <div class="alert alert-danger" style="font-size: 14px; padding: 10px; margin-bottom: 15px;">{{ Session::get('failed') }}</div>
        @endif
        @if (Session::get('logout'))
            <div class="alert alert-primary" style="font-size: 14px; padding: 10px; margin-bottom: 15px;">{{ Session::get('logout') }}</div>
        @endif
        @if (Session::get('canAccess'))
            <div class="alert alert-danger" style="font-size: 14px; padding: 10px; margin-bottom: 15px;">{{ Session::get('canAccess') }}</div>
        @endif
        <div class="mb-3">
            <label for="email" class="form-label" style="font-size: 16px; font-weight: bold;">Email</label>
            <input type="email" name="email" id="email" class="form-control" style="padding: 10px; font-size: 14px; border-radius: 5px;">
            @error('email')
                <small class="text-danger" style="font-size: 12px; font-style: italic;">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label" style="font-size: 16px; font-weight: bold;">Password</label>
            <div class="input-group">
                <input type="password" name="password" id="password" class="form-control" style="padding: 10px; font-size: 14px; border-radius: 5px;">
                <span class="input-group-text" id="togglePassword" style="cursor: pointer; background-color: #f1f1f1; border-radius: 5px; padding: 0 10px;">
                    <i class="bi bi-eye" id="eyeIcon" style="font-size: 18px;"></i>
                </span>
            </div>
            @error('password')
                <small class="text-danger" style="font-size: 12px; font-style: italic;">{{ $message }}</small>
            @enderror
        </div>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script>
            document.getElementById('togglePassword').addEventListener('click', function () {
                const passwordInput = document.getElementById('password');
                const eyeIcon = document.getElementById('eyeIcon');
        
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.remove('bi-eye');
                    eyeIcon.classList.add('bi-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('bi-eye-slash');
                    eyeIcon.classList.add('bi-eye');
                }
            });
        </script>
                
        <button type="submit" class="btn btn-success" style="width: 100%; padding: 12px; font-size: 16px; border-radius: 5px;">LOGIN</button>
    </form>
@endsection

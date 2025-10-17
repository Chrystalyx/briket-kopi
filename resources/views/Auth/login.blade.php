@extends('layouts.guest')

@section('title', 'Login')

@section('style')
    <style>
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px 24px;
            flex-grow: 1;
        }

        .form-card {
            background-color: rgba(255, 255, 255, 0.9); 
            backdrop-filter: blur(12px); 
            border: 1px solid rgba(255, 255, 255, 0.4); 
            
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); 
            padding: 32px 40px;
            width: 100%;
            max-width: 420px;
        }
        .form-title { font-size: 1.75rem; font-weight: 700; color: #532E1C; margin-bottom: 8px; text-align: center; }
        .form-subtitle { color: rgba(83, 46, 28, 0.7); margin-bottom: 28px; font-size: 14px; text-align: center; }
        .form-label { display: block; font-size: 13px; font-weight: 600; color: #532E1C; margin-bottom: 8px; }
        .form-link { color: #C5A880; text-decoration: none; font-weight: 600; transition: all 0.3s ease; }
        .form-link:hover { color: #b89a70; text-decoration: underline; }
        .form-footer { text-align: center; margin-top: 24px; font-size: 14px; color: #532E1C; }
        
        .input-field { position: relative; }
        .input-field input {
            width: 100%; padding: 13px 16px 13px 44px;
            border: 2px solid #E6E6E6;
            border-radius: 10px; background: #FFFFFF;
            color: #532E1C; font-size: 14px; transition: all 0.3s ease;
        }
        .input-field input::placeholder { color: rgba(83, 46, 28, 0.5); }
        .input-field input:focus {
            outline: none; border-color: #C5A880;
            box-shadow: 0 0 0 3px rgba(197, 168, 128, 0.2);
        }
        .input-icon {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #C5A880;
            width: 20px; height: 20px;
        }

        .btn-submit {
            background-color: #C5A880; color: #0F0F0F;
            font-weight: 700; width: 100%; padding: 14px;
            border-radius: 10px; border: none; cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(197, 168, 128, 0.2);
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(197, 168, 128, 0.35); }
    </style>
@endsection

@section('content')
<div class="form-container">
    <div class="form-card">
        <h1 class="form-title">Selamat Datang</h1>
        <p class="form-subtitle">Masuk ke akun Briko Anda</p>

        <form class="space-y-5" method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email" class="form-label">Email Address</label>
                <div class="input-field">
                    <i data-lucide="mail" class="input-icon"></i>
                    <input type="email" id="email" name="email" placeholder="nama@example.com" required>
                </div>
            </div>

            <div>
                <label for="password" class="form-label">Password</label>
                <div class="input-field">
                    <i data-lucide="lock" class="input-icon"></i>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 accent-[#C5A880] cursor-pointer rounded">
                    <span class="text-sm text-[#532E1C] font-medium">Ingat saya</span>
                </label>
                <a href="#forgot" class="form-link text-sm">Lupa password?</a>
            </div>

            <button type="submit" class="btn-submit !mt-7">Masuk ke Akun</button>
        </form>

        <div class="form-footer">
            <p>Belum punya akun? <a href="{{ route('register') }}" class="form-link">Daftar di sini</a></p>
        </div>
    </div>
</div>
@endsection
@extends('layouts.guest')

@section('title', 'Register')

@section('style')
    <style>
        body {
            background-color: #f9fafb; 
        }
        
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px 24px; 
            flex-grow: 1; 
        }

        .form-card {
            background-color: #FFFFFF;
            border: 1px solid #E6E6E6;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
            padding: 32px 40px;
            width: 100%;
            max-width: 560px; 
        }
        .form-title { font-size: 1.75rem; font-weight: 700; color: #532E1C; margin-bottom: 8px; text-align: center; }
        .form-subtitle { color: rgba(83, 46, 28, 0.7); margin-bottom: 28px; font-size: 14px; text-align: center; }
        .form-label { display: block; font-size: 13px; font-weight: 600; color: #532E1C; margin-bottom: 8px; }
        .form-link { color: #C5A880; text-decoration: none; font-weight: 600; transition: all 0.3s ease; }
        .form-link:hover { color: #b89a70; text-decoration: underline; }
        .form-footer { text-align: center; margin-top: 24px; font-size: 14px; color: #532E1C; }
        
        .input-field { position: relative; }
        .input-field input, .input-field textarea {
            width: 100%; padding: 13px 16px 13px 44px;
            border: 2px solid #E6E6E6;
            border-radius: 10px; background: #FFFFFF;
            color: #532E1C; font-size: 14px; transition: all 0.3s ease;
        }
        .input-field textarea { resize: vertical; min-height: 70px; padding-top: 13px; }
        .input-field input::placeholder, .input-field textarea::placeholder { color: rgba(83, 46, 28, 0.5); }
        .input-field input:focus, .input-field textarea:focus {
            outline: none; border-color: #C5A880;
            box-shadow: 0 0 0 3px rgba(197, 168, 128, 0.2);
        }
        .input-icon {
            position: absolute; left: 14px; top: 14px;
            color: #C5A880;
            width: 20px; height: 20px; flex-shrink: 0;
        }
        .input-icon-password { 
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

        .radio-group { display: flex; gap: 24px; margin-top: 10px; }
        .radio-option { display: flex; align-items: center; gap: 8px; cursor: pointer; }
        .radio-option input[type="radio"] { width: 18px; height: 18px; cursor: pointer; accent-color: #C5A880; }
        .radio-option label { cursor: pointer; font-weight: 500; color: #532E1C; user-select: none; }
        
        .conditional-fields { max-height: 0; overflow: hidden; opacity: 0; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .conditional-fields.active { max-height: 800px; opacity: 1; margin-top: 16px; }
        
        .error-text { color: #dc2626; font-size: 13px; margin-top: 6px; }
    </style>
@endsection

@section('content')
<div class="form-container">
    <div class="form-card">
        <h1 class="form-title">Buat Akun Baru</h1>
        <p class="form-subtitle">Mulai perjalanan Anda bersama Briko</p>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 rounded">
                <div class="text-red-800 font-semibold mb-2">Terjadi Kesalahan</div>
                @foreach ($errors->all() as $error)
                    <div class="text-red-700 text-sm">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="form-label">Nama Lengkap</label>
                <div class="input-field">
                    <i data-lucide="user" class="input-icon-password"></i>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                </div>
                @error('name') <div class="error-text">{{ $message }}</div> @enderror
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-field">
                        <i data-lucide="mail" class="input-icon-password"></i>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@example.com" required>
                    </div>
                    @error('email') <div class="error-text">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label for="phone" class="form-label">No Handphone</label>
                    <div class="input-field">
                        <i data-lucide="smartphone" class="input-icon-password"></i>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="08123456..." required>
                    </div>
                    @error('phone') <div class="error-text">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="password" class="form-label">Password</label>
                    <div class="input-field">
                        <i data-lucide="lock" class="input-icon-password"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>
                    @error('password') <div class="error-text">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <div class="input-field">
                        <i data-lucide="shield-check" class="input-icon-password"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
                    </div>
                </div>
            </div>

            <div>
                <label class="form-label">Tipe Akun</label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" id="pembeli" name="account_type" value="pembeli" {{ old('account_type', 'pembeli') == 'pembeli' ? 'checked' : '' }} required>
                        <label for="pembeli">Pembeli</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="penjual" name="account_type" value="penjual" {{ old('account_type') == 'penjual' ? 'checked' : '' }}>
                        <label for="penjual">Penjual</label>
                    </div>
                </div>
            </div>
            
            <div id="pembeli_fields" class="conditional-fields">
                <div>
                    <label for="buyer_address" class="form-label">Alamat Pembeli</label>
                    <div class="input-field">
                        <i data-lucide="map-pin" class="input-icon"></i>
                        <textarea id="buyer_address" name="buyer_address" placeholder="Masukkan alamat lengkap Anda">{{ old('buyer_address') }}</textarea>
                    </div>
                    @error('buyer_address') <div class="error-text">{{ $message }}</div> @enderror
                </div>
            </div>
            <div id="penjual_fields" class="conditional-fields">
                <div class="space-y-4">
                    <div>
                        <label for="store_name" class="form-label">Nama Toko</label>
                        <div class="input-field">
                            <i data-lucide="store" class="input-icon-password"></i>
                            <input type="text" id="store_name" name="store_name" value="{{ old('store_name') }}" placeholder="Nama toko Anda">
                        </div>
                        @error('store_name') <div class="error-text">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label for="business_address" class="form-label">Alamat Usaha</label>
                        <div class="input-field">
                            <i data-lucide="map-pin" class="input-icon"></i>
                            <textarea id="business_address" name="business_address" placeholder="Alamat usaha lengkap">{{ old('business_address') }}</textarea>
                        </div>
                        @error('business_address') <div class="error-text">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label for="store_description" class="form-label">Deskripsi Toko</label>
                        <div class="input-field">
                            <i data-lucide="clipboard-list" class="input-icon"></i>
                            <textarea id="store_description" name="store_description" placeholder="Jelaskan tentang toko Anda">{{ old('store_description') }}</textarea>
                        </div>
                        @error('store_description') <div class="error-text">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn-submit !mt-7">Daftar Akun</button>
        </form>

        <div class="form-footer">
            <p>Sudah punya akun? <a href="{{ route('login') }}" class="form-link">Masuk di sini</a></p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const accountTypeRadios = document.querySelectorAll('input[name="account_type"]');
    const pembeliFields = document.getElementById('pembeli_fields');
    const penjualFields = document.getElementById('penjual_fields');
    function updateConditionalFields() {
        accountTypeRadios.forEach(radio => {
            if (radio.checked) {
                if (radio.value === 'pembeli') {
                    pembeliFields.classList.add('active');
                    penjualFields.classList.remove('active');
                } else if (radio.value === 'penjual') {
                    penjualFields.classList.add('active');
                    pembeliFields.classList.remove('active');
                }
            }
        });
    }
    accountTypeRadios.forEach(radio => {
        radio.addEventListener('change', updateConditionalFields);
    });
    updateConditionalFields();
</script>
@endpush
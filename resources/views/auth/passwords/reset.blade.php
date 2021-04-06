@extends('layouts.auth')

@section('content')
    <form action="{{ route('password.update') }}" class="form" method="post">
        @csrf
        <a class="account-logo" href="index.html">
            <img src="img/weblogo.png" alt="">
        </a>
        <div class="form-content form-account">
            <input type="hidden" name="token" value="{{ $token }}">
            {{-- <input type="text" class="txt" placeholder="نام و نام خانوادگی"> --}}
            <input id="email" type="email" class="txt txt-1 @error('email') is-invalid @enderror" placeholder="ایمیل"
                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="password" type="password" class="txt txt-1 @error('password') is-invalid @enderror" name="password"
                required autocomplete="new-password" placeholder="رمز عبور جدید">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="password-confirm" type="password" class="txt txt-1" name="password_confirmation" required
                autocomplete="new-password" placeholder="تکرار رمز عبور">
            <span class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای غیر الفبا
                مانند !@#$%^&*() باشد.</span>
            <br>
            <button class="btn continue-btn">به روز رسانی رمز عبور</button>

        </div>
        <div class="form-footer">
            <a href="login.html">صفحه ورود</a>
        </div>
    </form>
@endsection

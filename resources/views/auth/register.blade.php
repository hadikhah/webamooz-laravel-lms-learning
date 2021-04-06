@extends('layouts.auth')

@section('content')

    </html>
    <form action="{{ route('register') }}" class="form" method="POST">
        @csrf
        <a class="account-logo" href="/">
            <img src="img/weblogo.png" alt="">
        </a>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-content form-account">
            <input type="text" class="txt @error('name') is-invalid @enderror" placeholder="نام و نام خانوادگی *"
                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="email" type="email" class="txt txt-l @error('email') is-invalid @enderror" placeholder="ایمیل *"
                name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="mobile" type="text" class="txt txt-l @error('mobile') is-invalid @enderror"
                placeholder=" شماره موبایل با 09" name="mobile" value="{{ old('mobile') }}" autocomplete="mobile">
            <input id="password" type="password" class="txt @error('password') is-invalid @enderror" name="password"
                required autocomplete="new-password" placeholder="رمز عبور *">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="password-confirm" type="password" class="txt @error('password') is-invalid @enderror"
                name="password_confirmation" required autocomplete="new-password" placeholder="تایید رمز عبور *">
            @error('password-confirm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و
                کاراکترهای غیر الفبا مانند !@#$%^&*() باشد.</span>
            <br>
            <button class="btn continue-btn">ثبت نام و ادامه</button>

        </div>
        <div class="form-footer">
            <a href="/login">صفحه ورود</a>
        </div>
    </form>

@endsection

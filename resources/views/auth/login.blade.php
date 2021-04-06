@extends('layouts.auth')

@section('content')

    <form action="{{ route('login') }}" class="form" method="POST">
        @csrf
        <a class="account-logo" href="/">
            <img src="/img/weblogo.png" alt="">
        </a>
        <div class="form-content form-account">
            <input id="username" name="username" type="text" class="txt-l txt @error('email') is-invalid @enderror"
                placeholder="ایمیل یا شماره موبایل" value="{{ old('email') }}" required autocomplete="username" autofocus>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="password" name="password" id="password" class="txt-l txt" autocomplete="current-password" required
                placeholder="رمز عبور">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br>
            <button class="btn btn--login">ورود</button>
            <label class="ui-checkbox">
                مرا بخاطر داشته باش
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="checkmark"></span>
            </label>
            <div class="recover-password">
                <a href="#recoverpassword">بازیابی رمز عبور</a>
            </div>
        </div>
        <div class="form-footer">
            <a href="register">صفحه ثبت نام</a>
        </div>
    </form>

@endsection

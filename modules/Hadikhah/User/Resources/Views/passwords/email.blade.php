@extends('View::layouts.auth')

@section('content')
    <form action="{{ route('password.email') }}" class="form" method="post">
        @csrf
        <a class="account-logo" href="index.html">
            <img src="/img/weblogo.png" alt="">
        </a>
        <div class="form-content form-account">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <input id="email" type="text" class="txt-l txt  @error('email') is-invalid @enderror" placeholder="ایمیل"
                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <br>
            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button type="submit" class="btn btn-recoverpass">بازیابی</button>
        </div>
        <div class="form-footer">
            <a href="login.html">صفحه ورود</a>
        </div>
    </form>

@endsection

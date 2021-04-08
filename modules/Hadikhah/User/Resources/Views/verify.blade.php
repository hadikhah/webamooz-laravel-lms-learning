@extends('View::layouts.auth')
@section('content')
    <form class="form" method="POST" action="{{ route('verification.resend') }}">
        <a class="account-logo" href="/">
            <img src="/img/weblogo.png" alt="">
        </a>

        <div class="form-content form-account">
            <div class="text-center recover-password">{{ __('ایمیلتان را تایید کنید') }}</div>
            @if (session('resent'))
                <div class="text-center recover-password" role="alert">
                    {{ __('لینک تایید جدید به ایمیل شما ارسال شده است') }}
                </div>
            @endif
            <div class="text-center recover-password">
                {{ __('قبل از ادامه دادن ، لطفا ایمیل خود را چک کنید') }}
                {{ __(' اگر ایمیلی دریافت نکردید دوباره درخواست دهید') }}
            </div>
            @csrf
            <button type="submit" class="btn">{{ __('دریافت دوباره ایمیل تایید') }}</button>
            .
        </div>
        <div class="form-footer">
            <a href="/">بازگشت به صفحه اصلی</a>
        </div>
    </form>
@endsection

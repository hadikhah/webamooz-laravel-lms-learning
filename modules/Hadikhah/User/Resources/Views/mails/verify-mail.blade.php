@component('mail::message')
# کد فعالسازی
{{$user->name}} عزیز

این ایمیل حاوی کد فعالسازی ثبت نام شما در وبلاگ است. در صورتی که **ثبت نام توسط شما انجام نشده است** این ایمیل را نادیده بگیرید

: کدفعالسازی شما
@component('mail::panel')
{{$code}}
@endcomponent

این کد فقط تا **یک ساعت** معتبر است

@component('mail::footer')
تیم وبسایت 
{{ config('app.name') }}
@endcomponent

@endcomponent

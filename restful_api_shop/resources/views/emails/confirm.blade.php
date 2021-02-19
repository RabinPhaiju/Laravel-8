@component('mail::message')
# Hello {{$user->name}} 

Your email is change. Please verifty this email.

@component('mail::button',['url'=>route('verify',$user->verification_token)])
Verify Account
@endcomponent
Thanks,<br>
{{config('app.name')}}

@endcomponent
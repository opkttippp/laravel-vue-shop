@component('mail::message')

    # Email Confirmation

Перейдите по ссылке ...

    @component('mail::button', ['url' => route('register.verify', ['token' => $user->verify_token])])
        Verify Email
    @endcomponent

@endcomponent

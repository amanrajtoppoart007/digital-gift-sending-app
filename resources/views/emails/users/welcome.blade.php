@component('mail::message')
# Welcome, {{ request()->input('name') }}

Welcome to demo company,

Thank your for registering with us.

Please note your credentials.
<br>
email: {{request()->input('email')}}<br>
password -{{request()->input('password')}}<br>


@component('mail::button', ['url' =>URL::to('login')])
EXPLORE NOW
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

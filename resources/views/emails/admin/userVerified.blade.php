@component('mail::message')
Hi {{$data['name']}},
We are happy to inform that your account in {{trans('panel.site_title')}},
<br>
Has been successfully verified by admin.you can now login in to your account.
<br>
@component('mail::button', ['url' => route('login',['email'=>$data['email']])])
Login
@endcomponent

Thanks,<br>
{{ trans('panel.site_title') }}
@endcomponent

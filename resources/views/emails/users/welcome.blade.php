@component('mail::message')
# Welcome New User

Krishakvikas.com में आपका स्वागत है। आप कृषक  के रूप में सफलतापूर्वक पंजीकृत हैं।<br>
        आप अब हमारे पोर्टल का उपयोग  शुरू कर सकते हैं, पोर्टल के लिंक और क्रेडेंशियल्स नीचे दिए गए हैं।<br>
उपयोगकर्ता नाम -{{request()->input('email')}}<br>
पासवर्ड -{{request()->input('password')}}<br>


@component('mail::button', ['url' =>URL::to('login')])
EXPLORE NOW
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

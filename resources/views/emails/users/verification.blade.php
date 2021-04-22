<div class="mx-4">
    <p><strong># Hello, {{$data['name']}}</strong></p>

    <h4>Welcome to demo company,</h4>

    <p>You are receiving this email because you've registered with us and to use our service you must verify your email address.</p>

    <br>

    @component('mail::button', ['url' => $data['url']])
        CLICK TO VERIFY
    @endcomponent
    <br>
    If you’re having trouble clicking the "Click to Verify" button,
    copy and paste the URL below into your web browser: <a href="{{ $data['url'] }}">{{ $data['url'] }}</a>
    <br>
    Thanks,<br>
    {{ config('app.name') }}
</div>

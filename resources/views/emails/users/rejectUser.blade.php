<div class="mx-4">
    <p><strong># Hello, {{$data['name']}}</strong></p>

    <h4>Your account was reject</h4>

    <p>{{$data['remark']}}</p>

    <br>

    @component('mail::button', ['url' => $data['url']])
        CLICK TO UPLOAD
    @endcomponent
    <br>
    If you’re having trouble clicking the "Click to Verify" button,
    copy and paste the URL below into your web browser: <a href="{{ $data['url'] }}">{{ $data['url'] }}</a>
    <br>
    Thanks,<br>
    {{ config('app.name') }}
</div>

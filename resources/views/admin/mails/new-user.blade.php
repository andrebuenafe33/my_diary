@component('mail::message')
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        <img src="{{ asset('/images/download.jpg') }}" alt="{{ config('app.name') }} Logo">
        {{ config('app.name') }}
    @endcomponent
@endslot
# You are Invited!
<br>
Hello {{ $inviteData['user']->name }},  
<br><br>
{{ $inviteData['invitedBy']}} has invited you to CDL's Internship Duty Diary  
<br><br>
*****************************************<br>
Username: {{ $inviteData['user']->email }}<br>
Temporary Password: {{ $inviteData['pass'] }}<br>
*****************************************
<br>
@component('mail::button', ['url' => $inviteData['url'], 'class'=>'text-right'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
@component('mail::message')
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        <img src="{{ asset('images/download.jpg') }}" alt="{{ config('app.name') }} Logo">
        {{ config('app.name') }}
    @endcomponent
@endslot
# Duty Diary Approval Request
<br>
Hello {{ $diary['supervisor'] }},  
<br><br>
{{ $diary['trainee']}} has requested approval for their duty diary.
<br><br>
@component('mail::button', ['url' => $diary['url'], 'class'=>'text-right'])
View Duty Diary
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
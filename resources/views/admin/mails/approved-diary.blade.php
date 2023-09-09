@component('mail::message')
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        <img src="{{ asset('images/download.jpg') }}" alt="{{ config('app.name') }} Logo">
        {{ config('app.name') }}
    @endcomponent
@endslot
# Duty Diary Approved
<br>
Hello {{ $approvedDiary['trainee'] }},  
<br><br>
Congratulations! Your supervisor {{ $approvedDiary['supervisor']}} has approved duty diary.
<br><br>
@component('mail::button', ['url' => $approvedDiary['url'], 'class'=>'text-right'])
View Duty Diary
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
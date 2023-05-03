@component('mail::message')
# A Heading



- Name: {{$name}}
- Phone: {{$phone}}

@component('mail::button',['url' => 'https://ggiturkey.com'])
    Visit investbul
@endcomponent
@endcomponent

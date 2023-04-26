@component('mail::message')
Hi {{ $name }},


@component('mail::button', ['url' => 'neguinhomotors.co.uk/contact'])
CLICK HERE
@endcomponent

@endcomponent
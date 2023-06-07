@component('mail::message')
Hi {{ $first_name }},


@component('mail::button', ['url' => 'neguinhomotors.co.uk/contact'])
CLICK HERE
@endcomponent

@endcomponent

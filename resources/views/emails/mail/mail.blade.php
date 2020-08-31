@component('mail::message')
{{$data['subject']}}

{!!$data['message']!!}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{-- {{ ('app.name') }} --}}
@endcomponent

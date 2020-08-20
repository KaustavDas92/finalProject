@component('mail::message')
{{--# Introduction--}}

{{--The body of your message.--}}

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

{{--Thanks,<br>--}}
{{--{{ config('app.name') }}--}}

{{--    {{$data}}--}}
# A New Message from {{$data->name}}

{{$data->message}}

@endcomponent

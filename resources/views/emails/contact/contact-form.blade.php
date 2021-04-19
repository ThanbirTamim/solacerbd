@component('mail::message')
# Introduction


@component('mail::button', ['url' => ''])
See More
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

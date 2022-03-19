@component('mail::message')
# Introduction

Welcome to facebook app i hope you will enjoy your stay
The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
# Request Approved

Your request has been approved. Please find the attached PDF Docs for details.

@component('mail::button', ['url' => '#'])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

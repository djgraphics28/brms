<x-mail::message>
# Contact Us Mail

Hello,

You have received a new message from {{ $name }}.

**Email:** {{ $email }}

**Message:**

{{ $messageContent }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

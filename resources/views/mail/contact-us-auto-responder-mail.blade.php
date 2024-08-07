<x-mail::message>
# Thank You for Contacting Us!

Hi {{ $name }},

Thank you for reaching out to us. We have received your message and will get back to you as soon as possible. If your inquiry is urgent, please call us at 286812435.

In the meantime, feel free to explore our website for more information.

<x-mail::button :url="config('app.url')">
Visit Our Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

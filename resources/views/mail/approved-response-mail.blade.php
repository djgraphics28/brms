<x-mail::message>
# Request Approved

Dear {{ $data['name'] }},

We are pleased to inform you that your request has been approved. You can now claim your {{ $data['requestType'] }}.

Please visit our office between 8 AM and 5 PM to collect it. Remember to bring a valid ID for verification.

If you have any questions or need further assistance, feel free to contact our support team.

Congratulations, and thank you for choosing {{ config('app.name') }}.

Best regards,<br>
{{ config('app.name') }} Team
</x-mail::message>

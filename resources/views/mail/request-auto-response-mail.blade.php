<x-mail::message>
# Request Submitted Successfully

Dear {{ $data['name'] }},

Thank you for submitting your request. We are pleased to inform you that your application has been received successfully.

You can claim the {{ $data['requestType'] }} within 48 hours after your request has been approved. Please visit our office between 8 AM and 5 PM to collect it.

<x-mail::button :url="''">
View Your Application Status
</x-mail::button>

If you have any questions or need further assistance, feel free to contact our support team.

Thanks,<br>
{{ config('app.name') }} Team
</x-mail::message>

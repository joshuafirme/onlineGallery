<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make It Memories Affiliate Commission Confirmation</title>
</head>

<body style="font-family: 'Arial', sans-serif;">

    <p>Dear {{ $data->account_name }},</p>

    <p>Congratulations! You've successfully earned a commission through the Make It Memories Affiliate Program. We
        appreciate your dedication and effort in promoting our products.</p>

    <strong>Commission Details:</strong>
    <ul>
        <li><strong>Commission Amount:</strong> {{ $data->commission_amount }} {{ env('PAYPAL_CURRENCY') }}</li>
        @php
            $link = env('APP_URL') . '/homepage/' . Utils::slugify($data->account_name, '-');
        @endphp
        <li><strong>From Affiliate Link:</strong> <a href="{{ $link }}" target="_blank">{{ $link }}</a>
        </li>
        <li><strong>Date:</strong> {{ date('Y-m-d') }}</li>
    </ul>

    <p><strong>Payment Process:</strong><br>
        Your commission will be processed according to our payment schedule. Please allow [Processing Time] for the
        funds to be transferred to your account.
    </p>

    <p><strong>Your Dashboard Link:</strong><br>

        <a href="{{ env('APP_URL') }}/affiliate-dashboard/{{ $data->uuid }}">Your Unique Affiliate Dashboard Link</a>
    </p>

    <p><strong>Next Steps:</strong><br>
        Continue promoting Make It Memories and watch your earnings grow. If you have any questions or need assistance,
        feel free to reach out to our affiliate support team.
    </p>

    <p>Thank you for your commitment to Make It Memories. We look forward to more successful collaborations in the
        future!</p>

    <p>Best regards,<br>
        Make It Memories Affiliate Team
    </p>

</body>

</html>

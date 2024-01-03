<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Confirmation</title>
</head>

<body>
    <p>Dear {{ $data->account_name }},</p>

    <p>Congratulations and welcome to the Make It Memories Affiliate Program! We are thrilled to have you on board and
        look forward to embarking on this exciting journey of capturing and cherishing memories together.</p>

    <strong>Affiliate Details:</strong>
    <ul>
        <li><strong>Account Name:</strong> {{ $data->account_name }}</li>
        <li><strong>Email:</strong> {{ $data->email }}</li>
        <li><strong>Unique Affiliate ID:</strong> {{ $data->uuid }}</li>
    </ul>

    <p><strong>Your Personalized Affiliate Dashboard:</strong><br>
        To get started, please click on the following link to access your personalized affiliate dashboard:<br>
        <a href="{{ env('APP_URL') }}/affiliate-dashboard/{{ $data->uuid }}">Your Unique Affiliate Dashboard Link</a>
    </p>

    <p>Happy promoting and earning!</p>

    <p>Best regards,<br>
        Make It Memories Affiliate Team
    </p>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
</head>

<body>
    <h1>Payment Successful</h1>
    <p>Dear <strong>{{ $clientName }} </strong>,</p>
    <p>We are pleased to inform you that your payment with transaction ID: <strong>{{ $transactionId }}</strong> has
        been successfully processed.</p>
    <p>Thank you for choosing our service. If you have any questions or need further assistance, feel free to contact
        us.</p>

    <a href="http://127.0.0.1:8000/your-gallery/{{ $uuid }}">View your Gallery</a>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medication Reminder</title>
</head>
<body>
    <p>Dear User,</p>

    <p>This is a reminder for your medication:</p>

    <ul>
        <li><strong>Medication Name:</strong> {{ $medication_name }}</li>
        <li><strong>Dosage:</strong> {{ $dosage }}</li>
        <li><strong>Time:</strong> {{ $medication_time }}</li>
        <!-- Add other details here -->
    </ul>

    <p>Remember to take your medication as prescribed.</p>

    <p>Best regards,<br>Your Medication Reminder Team</p>
</body>
</html>

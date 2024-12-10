<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Completed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-wrapper {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #28a745;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            font-size: 20px;
            color: #28a745;
            margin: 10px 0;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }
        .feedback-box {
            background: #e9f7ef;
            color: #155724;
            padding: 15px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin: 15px 0;
            font-size: 16px;
        }
        .button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }
        .button:hover {
            background-color: #218838;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            background: #f1f1f1;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <!-- Header -->
        <div class="header">
            <h1>Appointment Completed</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Hello {{ $username }},</h2>
            <p>We are delighted to inform you that your appointment with {{ $designername }} has been successfully completed.</p>
            
            <!-- Feedback Section -->
            <div class="feedback-box">
                <strong>Feedback from {{ $designername }}:</strong><br>
                {{ $feedback }}
            </div>

            <p>If you have any questions or would like to schedule another appointment, please feel free to contact us.</p>
            <a href="" class="button">View Appointments</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} Your Company. Thank you for choosing us!
        </div>
    </div>
</body>
</html>

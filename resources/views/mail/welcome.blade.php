<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
            color: #333333;
            text-align: left;
        }
        .content h2 {
            font-size: 20px;
            color: #007bff;
            margin-bottom: 10px;
        }
        .content p {
            line-height: 1.6;
            margin: 0 0 15px;
        }
        .footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: #555555;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
        }
        .cta-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Welcome to Decor Vista</h1>
        </div>
        <div class="content">
            <h2>Hello {{ $name }},</h2>
            <p>
                Thank you for registering on our platform! We are excited to have you join us as a 
                @if ($role === 'user')
                valued user.
                @else
                professional designer.
                @endif
            </p>
            <p>
                You can now explore your dashboard and access all the amazing features we have to offer.
            </p>
            <p>
                Click the button below to log in to your account:
            </p>
            <p style="text-align: center;">
                <a href="" class="cta-button">Login to Your Account</a>
            </p>
            <p>
                If you have any questions, feel free to contact our support team. We're here to help!
            </p>
            <p>
                Best regards, <br>
                The Decor Vista Team
            </p>
        </div>
        <div class="footer">
            <p>
                &copy; {{ date('Y') }} [Your Website Name]. All rights reserved. <br>
                <a href="">Privacy Policy</a> | 
                <a href="">Terms & Conditions</a>
            </p>
        </div>
    </div>
</body>
</html>

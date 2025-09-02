<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gresham Report Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
        }
        .logo-top {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo-top img {
            height: 80px;
        }
        .footer {
            margin-top: 40px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
            font-size: 14px;
        }
        .footer .logo {
            height: 50px;
            margin-bottom: 10px;
        }
        .footer .icon {
            height: 16px;
            vertical-align: middle;
            margin-right: 5px;
        }
        a {
            color: #1a0dab;
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Website logo at the top -->
        <!-- <div class="logo-top">
            <img src="{{ asset('images/logo.png') }}" alt="Gresham Global Logo">
        </div> -->

        <!-- Email content -->
        <p>Dear {{ $full_name }},</p>

        <p>Thank you for your interest in Gresham Global’s report on <strong>{{ $title }}</strong>. I have attached the same for your reference.</p>

        <p>This report is created to support a deeper understanding of the Education and Industry Landscape across India.</p>

        <p>More reports and resources can be accessed anytime on <a href="https://gresham.world/publications" target="_blank">https://gresham.world/publications</a></p>

        <p><strong>About Gresham Global:</strong><br>
            <a href="https://gresham.world/" target="_blank">Gresham Global</a> supports international universities as an in-country partner, helping them build their brand and meaningful connections with students, institutions, and education professionals across the region.
            Our services include in-country representation, academic collaborations, research and assessment, admission compliance, strategic marketing, and operational support.
            If you would like further information about our offerings, please feel free to connect, and I will be happy to assist.
        </p>

        <p>Happy Reading,<br>
        Jaspreet Singh (Mr.)<br>
        Co-Founder</p>

        <!-- Footer with logo and contact -->
        <div class="footer">
            <!-- Website logo above the contact details -->
            <img src="{{ asset('email/logo.png') }}" alt="Gresham Logo" class="logo">

            <p>
                <img src="{{ asset('email/phone.png') }}" class="icon" alt="Phone"> <a href="tel:+919773911384"> +91 97739 11384</a> <br>
                <img src="{{ asset('email/email.png') }}" class="icon" alt="Email">
                <a href="mailto:jaspreet@gresham.world">jaspreet@gresham.world</a><br>
                <img src="{{ asset('email/link.png') }}" class="icon" alt="Website">
                <a href="https://gresham.world" target="_blank">https://gresham.world</a>
            </p>
        </div>

        <p style="font-size: 12px; color: #777; margin-top: 30px;">
            The content of this message is confidential. If you have received it by mistake, please inform us by an email reply and then delete the message.
            It is forbidden to copy, forward, or in any way reveal the contents of this message to anyone.
            The integrity and security of this email cannot be guaranteed over the Internet.
            Therefore, the sender will not be held liable for any damage caused by the message.
        </p>
    </div>
</body>
</html>

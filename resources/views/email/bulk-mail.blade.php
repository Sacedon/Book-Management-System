<!DOCTYPE html>
<html>
<head>
    <title>Book Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h3 {
            font-size: 24px;
            text-align: center;
            margin: 20px 0;
            color: #333333;
        }

        p {
            font-size: 16px;
            text-align: center;
            margin: 10px 0;
            color: #666666;
        }
    </style>
</head>
<body>
    <h3>M Library, Inc.<br>Tubigon, Bohol</h3>

    <h1 style="text-align: center; margin: 40px 0;">Book Information</h1>

    <p>Greetings, {{ $book }}!</p>

    <p>{{ $content }}</p>
</body>
</html>

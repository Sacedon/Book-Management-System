<!DOCTYPE html>
<html>
<head>
    <title>Book Informations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h4 {
            font-size: 20px;
            text-align: center;
            margin: 20px 0;
        }

        h1 {
            font-size: 32px;
            text-align: center;
            margin: 20px 0;
        }

        p {
            font-size: 16px;
            text-align: center;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h4>MDC Library, Inc.<br>Tubigon, Bohol</h4>

    <h1>Book Information</h1>

    <p> {{ $book->title }},</p>

    <p>Here is your list of information.</p>
</body>
</html>

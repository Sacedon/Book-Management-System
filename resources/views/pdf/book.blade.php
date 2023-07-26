<!DOCTYPE html>
<html>
<head>
    <title>Books Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        /* Optional: Add specific styles for individual columns */
        /* td:nth-child(3), td:nth-child(4), td:nth-child(5) {
            font-style: italic;
        } */
    </style>
</head>
<body>
    <h1>Books Information</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Title</th>
                <th>Year</th>
                <th>Email</th>
                <!-- Add other book fields as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($books as $index => $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->email }}</td>
                    <!-- Add other book fields as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

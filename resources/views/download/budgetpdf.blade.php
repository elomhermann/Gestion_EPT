<!DOCTYPE html>
<html>
<head>
    <title>Rapport de budget</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Rapport de budget</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th> 
                <th>Budget</th>
                <th>Montant Alloué</th>
            </tr>
        </thead>
        <tbody>
            @foreach($budget as $budget)
                <tr>
                    <td>{{ $budget->id }}</td>
                    <td>{{ $budget->budget }}</td>
                    <td>{{ $budget->montantalloue }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

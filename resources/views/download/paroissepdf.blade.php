<!DOCTYPE html>
<html>
<head>
    <title>Rapport de paroisse</title>
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
    <h1>Rapport de paroisse</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th> 
                <th>Region</th>
                <th>Paroisse</th>
                <th>Adresse</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paroisse as $paroisse)
                <tr>
                    <td>{{ $paroisse->id }}</td>
                    <td>{{ $paroisse->region }}</td>
                    <td>{{ $paroisse->paroisse }}</td>
                    <td>{{ $paroisse->adresse }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

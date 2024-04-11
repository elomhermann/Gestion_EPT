<!DOCTYPE html>
<html>
<head>
    <title>Rapport de terrain</title>
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
    <h1>Rapport de terrain</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th> 
                <th>Adresse</th>
                <th>Superficie</th>
                <th>Prix d'achat</th>
                <th>Statut</th>
                <th>Documentation</th>
                <th>Date d'achat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($terrain as $terrain)
                <tr>
                    <td>{{ $terrain->id }}</td>
                    <td>{{ $terrain->adresse }}</td>
                    <td>{{ $terrain->superficie }}</td>
                    <td>{{ $terrain->prixdachat }}</td>
                    <td>{{ $terrain->statut }}</td>
                    <td>{{ $terrain->documentation }}</td>
                    <td>{{ $terrain->datedachat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Rapport de temple</title>
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
    <h1>Rapport de temple</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th> 
                <th>Nom du Temple</th>
                <th>Adresse</th>
                <th>Budget Alloue</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
                <th>Region</th>
            </tr>
        </thead>
        <tbody>
            @foreach($temple as $temple)
                <tr>
                    <td>{{ $temple->id }}</td>
                    <td>{{ $temple->nomtemple }}</td>
                    <td>{{ $temple->adresse }}</td>
                    <td>{{ $temple->budgetalloue }}</td>
                    <td>{{ $temple->datedebut }}</td>
                    <td>{{ $temple->datefin }}</td>
                    <td>{{ $temple->region }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

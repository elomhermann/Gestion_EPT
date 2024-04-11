<!DOCTYPE html>
<html>
<head>
    <title>Rapport de contrat</title>
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
    <h1>Rapport de contrat</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Propriete</th>
                <th>Date de debut</th>
                <th>Date de fin</th>
                <th>Durée</th>
                <th>Documents contractuels</th>
                <th>Paroisse</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contrat as $contrat)
                <tr>
                    <td>{{ $contrat->id }}</td>
                    <td>{{ $contrat->propriete }}</td>
                    <td>{{ $contrat->datedebut }}</td>
                    <td>{{ $contrat->datefin }}</td>
                    <td>{{ $contrat->durée }}</td>
                    <td>{{ $contrat->documentcontractuel }}</td>
                    <td>{{ $contrat->paroisse }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


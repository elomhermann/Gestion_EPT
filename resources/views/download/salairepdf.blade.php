<!DOCTYPE html>
<html>
<head>
    <title>Rapport de salaire</title>
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
    <h1>Rapport de salaire</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th> 
                <th>Nom</th>
                <th>Prenom</th>
                <th>Poste</th>
                <th>Salaire</th>
                <th>Mois</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salaire as $salaire)
                <tr>
                    <td>{{ $salaire->id }}</td>
                    <td>{{ $salaire->nom }}</td>
                    <td>{{ $salaire->prenom }}</td>
                    <td>{{ $salaire->poste }}</td>
                    <td>{{ $salaire->salaire }}</td>
                    <td>{{ $salaire->mois }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Rapport de locataire</title>
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
    <h1>Rapport de locataire</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Contrat de location</th>
                <th>Paroisse</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locataire as $locataire)
                <tr>
                    <td>{{ $locataire->id }}</td>
                    <td>{{ $locataire->nom }}</td>
                    <td>{{ $locataire->prenom }}</td>
                    <td>{{ $locataire->adresse }}</td>
                    <td>{{ $locataire->telephone }}</td>
                    <td>{{ $locataire->email }}</td>
                    <td>{{ $locataire->contratlocation }}</td>
                    <td>{{ $locataire->paroisse }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

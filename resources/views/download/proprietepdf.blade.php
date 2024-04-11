<!DOCTYPE html>
<html>
<head>
    <title>Rapport de propriete</title>
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
    <h1>Rapport de propriete</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th> 
                <th>Paroisse</th>
                <th>Adresse</th>
                <th>Propriete</th>
                <th>Valeur locative</th>
            </tr>
        </thead>
        <tbody>
            @foreach($propriete as $propriete)
                <tr>
                    <td>{{ $propriete->id }}</td>
                    <td>{{ $propriete->paroisse }}</td>
                    <td>{{ $propriete->adresse }}</td>
                    <td>{{ $propriete->propriete }}</td>
                    <td>{{ $propriete->valeurlocative }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

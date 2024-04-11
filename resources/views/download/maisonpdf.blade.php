<!DOCTYPE html>
<html>
<head>
    <title>Rapport de maison missionnaire</title>
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
    <h1>Rapport de maison missionnaire</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th> 
                <th>Adresse</th>
                <th>Description</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
                <th>Budgetalloue</th>
                <th>Suivi</th>
                <th>Paroisse</th>
            </tr>
        </thead>
        <tbody>
            @foreach($maison as $maison)
                <tr>
                    <td>{{ $maison->id }}</td>
                    <td>{{ $maison->adresse }}</td>
                    <td>{{ $maison->description }}</td>
                    <td>{{ $maison->datedebut }}</td>
                    <td>{{ $maison->datefin }}</td>
                    <td>{{ $maison->budgetalloue }}</td>
                    <td>{{ $maison->suivi }}</td>
                    <td>{{ $maison->paroisse }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

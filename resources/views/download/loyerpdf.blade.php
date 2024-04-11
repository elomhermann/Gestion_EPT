<!DOCTYPE html>
<html>
<head>
    <title>Rapport de loyer</title>
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
    <h1>Rapport de loyer</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Propriete</th>
                <th>Montant mensuel</th>
                <th>Montant annuel</th>
                <th>Date d'échéance</th>
                <th>Date de paiement</th>
                <th>Methode de paiement</th>
                <th>Statut</th>
                <th>Paroisse</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loyer as $loyer)
                <tr>
                    <td>{{ $loyer->id }}</td>
                    <td>{{ $loyer->propriete }}</td>
                    <td>{{ $loyer->montantmensuel }}</td>
                    <td>{{ $loyer->montantannuel }}</td>
                    <td>{{ $loyer->datedecheance }}</td>
                    <td>{{ $loyer->datepaiement }}</td>
                    <td>{{ $loyer->methodepaiement }}</td>
                    <td>{{ $loyer->statut }}</td>
                    <td>{{ $loyer->paroisse }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

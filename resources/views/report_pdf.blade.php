
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Informe en PDF</title>
        <style>
            body {
                font-family: "Sans-serif", serif;
                margin: 1em 10mm 30mm 10mm;
            }

            th, td{
                border-style: none none solid none;
            }
        </style>
    </head>
    <body>
        <h2>Informe de relaciones de la asignatura <h2>{{ $name_asignatura["name"] }}</h2></h2>
        <table>
            <tr>
                <th>Resultado</th>
                <th>Criterio de evaluación</th>
                <th>Evidencia</th>
                <th>Afirmación</th>
                <th>Modulo ICFES</th>
            </tr>
            @foreach($pdf_data as $data)
                <tr>
                    <td>{{ $data["resultado"] }}</td>
                    <td>{{ $data["criterio"] }}</td>
                    <td>{{ $data["evidencia"] }}</td>
                    <td>{{ $data["afirmacion"] }}</td>
                    <td>{{ $data["modulo"] }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>

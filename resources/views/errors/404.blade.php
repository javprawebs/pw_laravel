<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            font-size: 72px;
            margin: 0;
        }
        h2 {
            font-size: 24px;
            margin: 10px 0 20px;
        }
        p {
            font-size: 18px;
            margin: 20px 0;
        }
        a.btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        a.btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Página No Encontrada</h2>
        <p>Lo sentimos, la página que estás buscando no existe.</p>
        <p>Compruebe la URL, reinicie el navegador, si sigue sucediendo el problema por favor mande un mensaje a +34 677 13 82 13</p>
        <a href="{{ url('/') }}" class="btn">Volver al Inicio</a>
    </div>
</body>
</html>

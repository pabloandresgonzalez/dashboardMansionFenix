<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación estado de solicitud de Traslado</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f1f3f6;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        header {
            background-image: linear-gradient(310deg, #996e02, #fbcf33); /* Degradado dorado */
            color: #ffffff;
            padding: 16px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        header h1 {
            margin: 0;
            font-size: 28px;
            color: #ffffff; /* Texto blanco */
        }
        p {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
        }
        h1 {
            font-size: 24px;
            color: #996e02; /* Color dorado oscuro */
            margin-bottom: 10px;
        }
        .ul {
            font-size: 12px;
            color: #888;
        }
        .footer {
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-image: linear-gradient(310deg, #996e02, #fbcf33); /* Degradado dorado */
            color: #ffffff; /* Texto blanco */
            text-decoration: none;
            border-radius: 25px;
            margin-top: 20px;
            font-size: 16px;
            font-weight: 700;
            transition: transform 0.3s ease, color 0.3s ease;
        }
        .btn:hover {
            transform: scale(1.05);
            background-image: linear-gradient(310deg, #b0780d, #fdd835); /* Degradado más claro */
            color: #ffffff; /* Texto más claro al hacer hover */
        }
        /* Asegurar que el color blanco prevalezca en todos los estados */
        .btn:link, .btn:visited, .btn:active, .btn:hover {
            color: #ffffff !important; /* Forzamos el color blanco en todos los estados del enlace */
        }
        .footer img {
            max-width: 80px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h2>¡Cambio el estado del traslado de {{ $Wallet->currency }}!</h2>
    </header>
    <div class="container">   
        <p>Estimado(a) {{ $Wallet->email }},</p>
        <p>Se realizo el cambio de estado de la solicitud de traslado de {{ $Wallet->currency }} con los siguientes detalles:</p>   
        <ul style="list-style-type: none; text-align: left; padding-left: 0; font-size: 12px; line-height: 1.6; margin-left: 4px;">
            <li>No Id: {{ $Wallet->id }}</li>
            <li>Usuario: {{ $Wallet->email }}</li>
            <li>Id de usuario: {{ $Wallet->user }}</li>
            <li>Valor: {{ $Wallet->value }}</li>
            <li>Tarifa: {{ $Wallet->fee }}</li>
            <li>Moneda: {{ $Wallet->currency }}</li>
            <li>Estado: {{ $Wallet->status }}</li>
            <li>Detalle: {{ $Wallet->detail }}</li>
        </ul>
        <p>Para más detalles, puedes revisar tu historial de traslados en el Portal.</p> 
        <a href="{{ route('login') }}" class="btn">{{ config('app.name') }}</a>     
        <br><br>
        <p>¡Gracias por usar nuestros servicios!</p>
        <br>
        <p class="footer">
            <img src="cid:laravel-logo.png" class="logo" alt="Logo">
            <br><br>
            Este es un correo automático, por favor no responder.<br>
            © {{ date('Y') }} {{ config('app.name') }}.
        </p>
    </div>
</body>
</html>
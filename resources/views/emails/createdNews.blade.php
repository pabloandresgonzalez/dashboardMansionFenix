<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Noticia Creada</title>
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
            padding: 20px;
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
        <h1>¡Nueva Noticia Publicada!</h1>
    </header>
    <div class="container">        
        <h1>{{ $news->title }}</h1>
        <p>{{ $news->detail }}</p>
        <p><strong>{{ $news->created_at->format('d/m/Y') }}</strong></p>
        <a href="{{ route('login') }}" class="btn">Ver más detalles</a>
        <br><br><br><br>

        <p class="footer">
            <img src="cid:laravel-logo.png" class="logo" alt="Logo">
            <br>
            Este es un correo automático, por favor no responder.<br>
            © {{ date('Y') }} {{ config('app.name') }}.
        </p>
    </div>
</body>
</html>
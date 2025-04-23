<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="x-apple-disable-message-reformatting">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>

  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #333;
      color: #fff;
    }
    .email-container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #1A1A1A;
      padding: 40px;
      border-radius: 10px;
      text-align: center; /* Centrar todo el contenido */
      color: #FFFFFF;
    }
    .email-header img {
      max-width: 100px; /* Ajusta esto según el tamaño deseado de tu logo */
      margin-bottom: 20px;
    }
    .email-button {
      background-color: #007BFF;
      color: #FFFFFF !important;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      display: inline-block;
      margin-top: 20px;
    }
    .email-footer {
      color: #AAAAAA;
      font-size: 14px;
      margin-top: 40px;
      padding-top: 20px;
      border-top: 1px solid #333333;
    }
    .email-footer a {
      color: #FFFFFF;
      text-decoration: none;
    }
  </style>
  </head>
  <body>
    <div class="email-container">
      <div class="email-header">
        <img src="{{ env('APP_URL') }}theme-front/globaltalentsphere/img/icons/logo_circular_avatar.svg" alt="{{ env('APP_NAME') }} Logo" width="150px" height="150px">
      </div>
      <h2>Se ha recibido un mensaje de contacto del sitio web {{ env('APP_NAME') }}</h2><br>
      <h3>Nombre de la empresa: {{$nameCompany}}</h3>
      <h3>Responsable: {{$name}}</h3>
      <h3>Email: {{$email}}</h3>
      <h3>Telefono: {{$phone}}</h3>
      <h3>Linkedin: {{$linkedin}}</h3>
      <h3>Mensaje: {{$content}}</h3>

      {{-- <h3>Gracias por suscribirte! Antes de continuar, debes confirmar tu cuenta.</h3>
      <a href="" class="email-button">Confirmar tu cuenta</a> --}}
      <div class="email-footer">
        Saludos,<br>
        {{ env('APP_NAME') }} TEAM
        {{-- <p>Si tienes problemas presionando el botón de "Consultar Detalles", copia y pega el siguiente URL en tu navegador web: <a href="https://localhost/admin/users/556">https://localhost/admin/users/556</a></p> --}}
        <p>&copy; 2024 {{ env('APP_NAME') }}. Derechos reservados.</p>
      </div>
    </div>
  </body>
  </html>

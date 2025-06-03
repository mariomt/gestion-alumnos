<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>¡Bienvenido a gestión de alumnos!</title>
    <style type="text/css">
        /* Estilos en línea son recomendados para máxima compatibilidad */
        body { margin: 0; padding: 0; min-width: 100%!important; background-color: #f3f3f3; }
        table { border-spacing: 0; }
        td { padding: 0; }
        img { border: 0; }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f3f3f3;
            padding-bottom: 40px;
        }
        .main {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-radius: 4px;
            overflow: hidden;
        }
        .header {
            background-color: #your-primary-color; /* Reemplaza con tu color primario */
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .button {
            background-color: #your-accent-color; /* Reemplaza con tu color de acento */
            color: #ffffff !important;
            text-decoration: none !important;
            padding: 10px 20px;
            border-radius: 4px;
            display: inline-block;
        }
        .footer {
            background-color: #e0e0e0;
            padding: 20px;
            text-align: center;
            font-size: 0.8em;
            color: #777777;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td>
                    <table role="presentation" class="main">
                        <tr>
                            <td class="header">
                                <a href="#">
                                    <img src="https://stock.adobe.com/search?k=%22de+logo%22" alt="gestión de alumnos" width="150" style="display: block; margin: 0 auto;">
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="content">
                                <h2 style="color: #333333; text-align: center;">¡Bienvenido a la gestión de alumnos!</h2>
                                <p style="color: #555555; line-height: 1.5;">Hola {{$alumno->nombre}},</p>
                                <p style="color: #555555; line-height: 1.5;">¡Estamos muy contentos de tenerte a bordo! Gracias por unirte a nosotros.</p>
                                <p style="color: #555555; line-height: 1.5;">Para empezar, te recomendamos que hagas lo siguiente:</p>
                                <ul style="color: #555555; line-height: 1.5;">
                                    <li><b>Anota tu matrícula:</b> {{$alumno->matricula}}</li>
                                </ul>
                                <p style="color: #555555; line-height: 1.5;">Si tienes alguna pregunta, no dudes en contactar a nuestro equipo de soporte.</p>
                                <p style="text-align: center;">
                                    <a href="#" class="button">Ir a nuesrto sitio</a>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td class="footer">
                                <p>&copy; Todos los derechos reservados.</p>
                                <p><a href="#" style="color: #777777;">Política de Privacidad</a> | <a href="#" style="color: #777777;">Términos de Servicio</a></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
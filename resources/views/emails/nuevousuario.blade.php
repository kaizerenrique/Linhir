@component('mail::message')
Te damos la bienvenida a la plataforma web del Gremio {{ config('app.name') }}

## Dirigido a: {{$name}}
### Correo: {{$email}}
### Contraseña: {{$password}}

Es importante que inicie sesión y confirme su correo electrónico, una vez confirmado se recomienda ir al perfil y cambiar la contraseña.

@component('mail::button', ['url' => 'https://siscamve.xyz/login'])
Ingresar.
@endcomponent

Gracias,<br>
© {{ date('Y') }} {{ config('app.name') }}
@endcomponent
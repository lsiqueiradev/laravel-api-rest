@component('mail::message')

<h1>Olá {{ $user->name }},</h1>

<p>Você solicitou recentemente a redefinição de sua senha para sua conta. Use o botão abaixo para redefini-lo. Essa redefinição de senha é válida apenas pelas próximas 2 horas.</p>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/password/reset/'.$token])
    Resetar minha senha
@endcomponent

<p>Por segurança, essa solicitação foi recebida de um dispositivo seguro. Se você não solicitou uma redefinição de senha, ignore este e-mail ou entre em contato com o suporte se tiver dúvidas.</p>

<p>Obrigado <br>
Equipe Laravel Api Rest</p>

@component('mail::subcopy')

<p>Se você estiver tendo problemas com o botão acima, copie e cole o URL abaixo em seu navegador da web.</p>

<a href="http://127.0.0.1:8000/password/reset/{{$token}}">http://127.0.0.1:8000/password/reset/{{$token}}</a>

@endcomponent


@endcomponent

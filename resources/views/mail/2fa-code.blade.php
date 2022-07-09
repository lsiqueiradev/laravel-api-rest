@php
    setlocale(LC_TIME, config('app.locale'));
    \Carbon\Carbon::setLocale(config('app.locale'));
@endphp

@component('mail::message')

<h1>Olá {{ $user->name }},</h1>

<p>Alguém está tentando fazer login no Twitch com um novo dispositivo.</p>

<p>Digite o seguinte código para concluir o login:</p>

@component('mail::panel')
<p style="font-weight: bold; font-size: 26px; text-align: center; color: #000;">{{ $code->code }}</p>
@endcomponent
<p style="font-size: 12px; margin-top: -14px; text-align: center;"><b>Observe que este código expirará daqui 15 minutos.</b></p><br>

<p>Se você não iniciou este login, você deve alterar imediatamente sua senha do Twitch para garantir a segurança da conta.</p>

<p>Se o código não funcionar , solicite um novo código de verificação e tente estas etapas de solução de problemas:</p>

<ul>
    <li>Use uma guia anônima do navegador ou um navegador diferente</li>
    <li>Limpe o cache e os cookies do navegador e desative quaisquer complementos ou extensões do navegador</li>
    <li>Se você estiver usando o aplicativo {{ config('app.name') }}, verifique se ele está atualizado para a versão atual</li>
</ul>

<p>Obrigado <br>
Equipe {{ config('app.name') }}</p>

@endcomponent

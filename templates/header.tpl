<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {* <link rel="stylesheet" href="https://www.freepik.es/vector-gratis/fondo-tecnologico-gris_836736.htm"> *}
        <link rel="stylesheet" href="{$URL}css/general.css">
        <title>{$title}</title>
    </head>
    <body>
        <nav>
        {* Don't let this style here!!!!!!!!!!!!!!!!!!!! *}
            <div>
                <h1 id="nav-title">
                    <a href="{$URL}"  class="white-link">{$title}</a>
                </h1>
                <span id="nav-links">
                    <h4>
                        {if isset($smarty.session.user_name)}
                            <span id="user_name">{$smarty.session.user_name}</span>
                            <a href="{$URL}login" class="nav-link white-link" >
                                salir
                            </a>
                        {else}
                            <a href="{$URL}login" class="nav-link white-link">
                                página de login
                            </a>
                            <a href="{$URL}signUp" class="nav-link white-link">
                            {* <h4> *}
                                registrarse
                            </a>
                        {/if}
                        {if $isAdmin}
                            <a href="{$URL}usuarios" class="nav-link white-link">
                                Usuarios
                            </a>                   
                        {/if}
                    </h4>
                </span>
                {* It lacks a bar (/) followed of the link for signing up *}
            </div>
        </nav>
        <main>
        <!-- <i src="https://www.freepik.es/iconos-gratis/triangulada-flecha-izquierda_695798.htm"></i>
        <i></i> -->
     <!-- <i class="icon">aa</i> -->
     <!-- <i class="fas fa-angle-left icon"></i> -->
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
        <nav style="background: #aaa">
        {* Don't let this style here!!!!!!!!!!!!!!!!!!!! *}
            <h1 style="width: 20vw; text-align: center; display: inline-block">
                <a href="{$URL}">{$title}</a>
            </h1>
            <span style="width: 20vw; display: inline-block; margin-left: 55vw">
                <h4>
            <a href="{$URL}login">
                    página de login
                {* </h4> *}
            </a>
            /
            <a href="{$URL}signUp">
                {* <h4> *}
                    registrarse
            </a>
                </h4>
            </span>
            {* It lacks a bar (/) followed of the link for signing up *}

        </nav>
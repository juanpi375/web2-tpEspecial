{include 'header.tpl'}

<div style="text-align: center">
    <h2>Bienvenido!</h2>
    <h2>Registrese por favor..</h2>
    <form action="trySign" method="POST" style="width: 35vw; margin: auto; line-height: 30px;">
    <div style="margin-bottom: 20px;">
        <label for="Login_name">Nombre:</label>
        <input type="text" name="login_name" id="Login_name">
        <label for="Login_email">Email:</label>
        <input type="email" name="login_email" id="Login_email">
        <label for="Login_pass">Contraseña:</label>
        <input type="password" name="login_pass" id="Login_pass">
        <label for="Login_age">Edad:</label>
        <input type="number" name="login_age" id="Login_age">
        <input type="submit" value="Ingresar">
    </div>
    {if $error==1}
        <span style="border: 2px solid red; border-radius: 10px; padding: 5px; color: red">
            Por favor ingrese un usuario no existente
        </span>
    {/if}
    {if $error==2}
        <span style="border: 2px solid red; border-radius: 10px; padding: 5px; color: red">
            Por favor llene todos los campos
        </span>
    {/if}
    </form>
    <a href="{$URL}login">
    <h3>
        Ya tiene una cuenta? </br>
        Ingrese aquí mismo!
    </h3>
    </a>
    <a href="{$URL}">
    <h3>
        Quiere continuar sin loguearse? </br>
        Ingrese como invitado aquí
    </h3>
    </a>
</div>

{include 'footer.tpl'}
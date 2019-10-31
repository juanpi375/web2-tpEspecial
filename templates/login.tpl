{include 'header.tpl'}

<div style="text-align: center">
    <h2>Bienvenido nuevamente!</h2>
    <h2>Ingrese a su cuenta..</h2>
    <form action="tryLog" method="POST" style="width: 35vw; margin: auto; line-height: 30px;">
        <div style="margin-bottom: 20px;">
            <label for="Login_name">Nombre:</label>
            <input type="text" name="login_name" id="Login_name">
            <label for="Login_pass">Contraseña:</label>
            <input type="password" name="login_pass" id="Login_pass">
            <input type="submit" value="Ingresar">
        </div>
        {if $error==1}
            <span style="border: 2px solid red; border-radius: 10px; padding: 5px; color: red">
                Por favor ingrese un usuario y contraseña correctos
            </span>
        {/if}
        {if $error==2}
            <span style="border: 2px solid red; border-radius: 10px; padding: 5px; color: red">
                Por favor llene todos los campos
            </span>
        {/if}
    </form>
    <a href="{$URL}signUp">
    <h3>
        Aún no tiene una cuenta? </br>
        Créese una aquí mismo!
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
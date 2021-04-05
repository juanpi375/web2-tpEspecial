<form action="{$URL}editModel/{$prodNombre}/{$mod->id_modelo}/{$mod->nombre_m}/{$mod->foto}" method="POST" enctype="multipart/form-data">

    {if $error == 1}
        <span class="error-message">
            Ese nombre de modelo ya existe, por favor elija un nombre nuevo
        </span>
    {/if}

    <h3>Encuentra fallas en el modelo? Edítelo a continuación..</h3>

    <input type="text" name="m_name" id="M_name" placeholder="Nombre: " required>
    <input type="text" name="m_description" id="M_description" placeholder="Descripción: " required>
    <input type="file" name="m_photo" id="M_photo" placeholder="Foto: " required>
    <input type="submit" value="Guardar">
        {* If model name already existed *}
</form>

<h3>Desea eliminar el modelo?..</h3>
    <a href="{$URL}delModel/{$mod->id_modelo}/{$mod->foto}">
        <button>Eliminar</button>
    </a>


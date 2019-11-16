<form action="{$URL}editModel/{$prodNombre}/{$mod->id_modelo}/{$mod->nombre_m}/{$mod->foto}" method="POST" enctype="multipart/form-data">

    <h3>Encuentra fallas en el modelo? Edítelo a continuación..</h3>

    <label for="M_name">Nombre:</label>
    <input type="text" name="m_name" id="M_name">
    <label for="M_description">Descripción:</label>
    <input type="text" name="m_description" id="M_description">
    <label for="M_photo">Foto:</label>
    <input type="file" name="m_photo" id="M_photo">
    <input type="submit" value="Guardar">
</form>

<h3>Desea eliminar el modelo?..</h3>
    <a href="{$URL}delModel/{$mod->id_modelo}/{$mod->foto}">
        <button>Eliminar</button>
    </a>


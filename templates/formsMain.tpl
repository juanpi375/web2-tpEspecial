<form action="editProduct" method="POST">
    <h3>Seleccione un producto a editar..</h3>
    {* <h3>Editar </h3> *}
    <select name="p_selected" id="P_selected">
        {foreach from=$modArray item=model}
            <option value="{$model}">{$model}</option>
            {* Like this? *}
        {/foreach}
    </select>
    <label for="P_name">Nombre:</label>
    <input type="text" name="p_name" id="P_name">
    <input type="submit" value="Guardar">
</form> 

<form action="addProduct" method="POST">
    <h3>Agregar un nuevo producto..</h3>
    <label for="P_name">Nombre:</label>
    <input type="text" name="p_name" id="P_name">
    <input type="submit" value="Agregar">
</form>

<form action="addModel" method="POST">
    <h3>Agregar un nuevo modelo..</h3>
    <label for="P_selection"></label>
    <select name="p_selection" id="P_selection">
        {foreach from=$prodArray item=prod}
            <option value="{$prod->nombre}">{$prod->nombre}</option>
            {* Like this? *}
        {/foreach}
    </select>
    <label for="M_name">Nombre:</label>
    <input type="text" name="m_name" id="M_name">
    <label for="M_description">Descripción:</label>
    <input type="text" name="m_description" id="M_description">
    <label for="M_photo">Imágen:</label>
    <input type="file" name="m_photo" id="M_photo">
    {* // Is this ^ okey??? *}
    <input type="submit" value="Agregar">
</form>

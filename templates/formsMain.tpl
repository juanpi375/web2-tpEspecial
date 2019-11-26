<form action="editProd" method="POST" class="main-forms">
    <h3>Seleccione un producto a editar..</h3>
    {* <h3>Editar </h3> *}
    <select name="p_selected" id="P_selected">
        {foreach from=$prodArray item=prod}  
            <option value="{$prod->id_producto}">
            {$prod->nombre}
            </option>
        {/foreach}
    </select>
    <input type="text" name="p_name" id="P_name" placeholder="Nombre: ">
    <input type="submit" value="Guardar">
</form> 




<form action="addProd" method="POST" class="main-forms">
    <h3>Agregar un nuevo producto..</h3>
    <input type="text" name="p_name" id="P_name" placeholder="Nombre: ">
    <input type="submit" value="Agregar">
</form>

<!-- if(message == 1){
    Ese producto ya existe
} -->
<!-- if(message == 2){
    Ese modelo ya existe
} -->


<form action="addModel" method="POST" enctype="multipart/form-data" class="main-forms">
    <h3>Agregar un nuevo modelo..</h3>
    <div>        
        <select name="p_selection" id="P_selection">
            {foreach from=$prodArray item=prod}
            <option value="{$prod->id_producto}">{$prod->nombre}</option>
            {/foreach}
        </select>
    </div>
    <div>
        <input type="text" name="m_name" id="M_name" placeholder="Nombre: ">
    </div>
    <div>        
        <input type="text" name="m_description" id="M_description" placeholder="Descripción: ">
    </div>
    <div>        
        <input type="file" name="m_photo" id="M_photo" placeholder="Imágen: ">
    </div>
    <input type="submit" value="Agregar">
        {* If model name already existed *}
</form>

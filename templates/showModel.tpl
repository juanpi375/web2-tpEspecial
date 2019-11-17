{include 'header.tpl'}

    <a href="{$URL}{$prodNombre}">
        <h4>< Volver a {$prodNombre}</h4>
    </a>
    <div style="text-align: center">
        <h2>{$mod->nombre_m}</h2>
        <img src="../images/{$mod->foto}" alt="algo">
        <!-- {* The dot! *} -->
        <h3>{$mod->descripcion}</h3>
    </div>
    {if $isAdmin}
        {include 'modelCustomization.tpl'}
    {/if}
    {include "comments.tpl"}
{include 'footer.tpl'}
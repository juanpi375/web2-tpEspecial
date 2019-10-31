{include 'header.tpl'}
{* <p>This template is being shownnnnnnn</p> *}
{$aux=0}
{foreach from=$prodArray item=prod}
    {$aux=$aux+1}
{/foreach}
{if $aux==1}
    <a href="{$URL}">
        <h4>< Volver al listado</h4>
    </a>
{/if}
{foreach from=$prodArray item=prod}
    <ul>
        {if $isAdmin}
            <a href="{$URL}delProd/{$prod->id_producto}" style="display: inline-block">
                <h1>x----</h1>
            </a>  
        {/if}
        <a href="{$URL}{$prod->nombre}" style="display: inline-block">
            <h1>{$prod->nombre}</h1> 
        </a>
        {foreach from=$modArray item=mod}
            {if $prod->id_producto == $mod->id_producto}
            {* The line above will only be necesary without the model verification *}
            {* WRONG: the line above is for printing the correct item below its
            correspondent category *}
                <li>
                    {if $isAdmin}
                        <a href="{$URL}delModel/{$mod->id_modelo}/{$mod->foto}" style="display: inline-block">
                            <h3>x----</h3>
                        </a>            
                    {/if}
                    <a href="{$URL}{$prod->nombre}/{$mod->nombre_m}" style="display: inline-block">
                        <h3>{$mod->nombre_m}</h3>
                    </a>
                </li>
            {/if}
        {/foreach}
    </ul>
    {* {$aux=$aux+1} *}
{/foreach}
{if $aux>1 && $isAdmin}
{* In the condition must also be the filter of admin profile *}
    {include 'formsMain.tpl'}
{/if}
{include 'footer.tpl'}
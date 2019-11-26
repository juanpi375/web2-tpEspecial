{include "header.tpl"}
<ul>
{foreach from=$users item=user}
    {* <h2>{$smarty.session.user_name}</h2> *}
    {if $smarty.session.user_name != $user->nombre}
        <div>
            <li>
                <h2>
                    {$user->nombre}: {$user->email}
                    <h3>
                        <a href="{$URL}delUser/{$user->id_usuario}">
                            <span><i>Borrar usuario</i></span>
                        </a>
                        |
                        <a href="{$URL}toggleAdmin/{$user->id_usuario}">
                            <span><i>
                            {if $user->es_administrador}
                                Quitar permisos de administrador
                            {else} 
                                Dar permisos de administrador
                            {/if}
                            </i></span>
                        </a>    

                        <!-- Needs an if according to the user being admin or not -->
                    </h3>
                </h2>
            </li>
        </div>
    {/if}
{/foreach}
</ul>
{include "footer.tpl"}
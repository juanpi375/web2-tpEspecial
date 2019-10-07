{include 'header.tpl'}
<p>Yeahhhhhhhhhhhhhhhh</p>
{foreach from=$prodArray item=item}
{* {$x = 0}
{if $x == !'Perro'}
    {$x = $item->nombre}
    {* <p>{$item->nombre}</p> *}
    {* <p>{$item[0]}</p> *}
{* {/if} *} 
    {foreach from=$item item=aux}
    {* This link should take us to the category *}
        <a href="{$URL.$aux}"><p>{$aux}</p></a>   
        <a href="{$URL.$aux}/delProduct"><h2>X</h2></a>
    {* Other links should be created to access the models *}
        {* <a href="{$URL.$product}/{$model}"><p>{$model}</p></a> Does this work? *}
    {/foreach}
{* <h2>{$item->nombre}</h2>      *}
{/foreach}
{include 'formsMain.tpl'}
{include 'footer.tpl'}
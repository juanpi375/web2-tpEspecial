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
    <div class="comment-container" id="{$mod->id_modelo}">
        {literal}
            <div id="comment-unit" v-for="com in coms">
                <!-- <div id="{{com.id_comentario}}"> -->
                <span>
                    {{com.contenido}}
                </span>
                {/literal}
                {if $isAdmin}
                    {literal}
                        <span>
                            <!-- <a href="#" v-on:click="examExe(com)" class="comment-delete">X</a> -->
                            <a href="" v-on:click="deleteCom(com, ()=>{getCom()})" class="comment-delete">X</a>
                        </span>
                    {/literal}
                {/if}
                {literal}     
            </div>
                    <div>
                        <form method="POST" id="comment-add"> 
                            <label for="comment-input">Comentario:</label>
                            <input type="text" id="comment-input" >
                            <input type="submit" value="Enviar" v-on:click="addCom(()=>{getCom()})">
                        </form>    
                    </div>
            <!-- </div> -->
        {/literal}
        </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="{$URL}js/comments.js"></script>
{include 'footer.tpl'}
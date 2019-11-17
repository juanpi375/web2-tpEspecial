    <div class="comment-container" id="{$mod->id_modelo}">
        {literal}
            <div id="comment-unit" v-for="com in coms">
                <!-- <div id="{{com.id_comentario}}"> -->
                <!-- <span>
                    {{com}}
                </span> -->
                <span>
                    {{com.nombre_usuario}}: {{com.contenido}}
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
        </div>
        <div>
            {if isset($smarty.session.user_name)}
            <!-- <div>
                {$smarty.session.user_name}
            </div> -->
            <!-- {$aux = $smarty.session.user_name} -->
                {literal}     
                <form method="POST" id="comment-add"> 
                    <label for="comment-input">Comentario:</label>
                    <input type="text" id="comment-input" >
                    <input type="submit" value="Enviar" v-on:click="addCom(()=>{getCom()})">
                </form>   
                {/literal}
            {/if}
        </div>
            <!-- </div> -->
    </div>
                    
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="{$URL}js/comments.js"></script>
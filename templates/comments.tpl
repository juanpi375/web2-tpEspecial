    <div class="comment-container" id="{$mod->id_modelo}">
    <h2>
    <span>Puntaje del modelo:</span>
    <span id="overall-score">0</span>
    </h2>
            {* <h1>{{coms.length}}</h1> *}
            {* <h1 id="overall-score"></h1> *}
        {literal}
        
            <div id="comment-unit" v-for="com in coms">
                <!-- <div id="{{com.id_comentario}}"> -->
                <!-- <span>
                    {{com}}
                </span> -->
                <span>
                    {{com.nombre_usuario}}: {{com.contenido}}  [{{com.puntaje}}]
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
            {* {if isset($smarty.session.user_name)} *}
            <!-- <div>
                {$smarty.session.user_name}
            </div> -->
            <!-- {$aux = $smarty.session.user_name} -->
            <!-- ----------------------------------------------------------------- -->
            <div id="filters">
                <h4>Ordenar por: </h4>
                <select id="comment-filter">
                    <option value="id_comentario">Fecha</option>
                    <option value="puntaje">Puntaje</option>
                    <option value="nombre_usuario">Usuario</option>
                </select> 
                <select id="comment-filter-order">
                    <option value="ASC">Ascendente</option>
                    <option value="DESC">Descendente</option>
                </select> 
            </div>
            {if isset($smarty.session.user_name)}
                {literal} 
                    <form method="POST" id="comment-add"> 
                        <label for="comment-input">Comentario:</label>
                        <input type="text" id="comment-input" required>
                        <label for="comment-score">Puntaje:</label>
                        <select id="comment-score">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <input type="submit" value="Enviar" v-on:click="addCom(()=>{getCom()})">
                    </form>   
                {/literal}
                <!-- ------------------------------------------------------------- -->
            {/if}
        </div>
            <!-- </div> -->
    </div>
                    
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="{$URL}js/comments.js"></script>
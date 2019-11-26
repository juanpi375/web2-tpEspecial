let container = document.querySelector(".comment-container");
console.log(container.id);
let userFromNav = document.querySelector("#user_name");

// console.log(userFromNav.innerHTML);

// let delComments = document.querySelectorAll(".comment-delete");
// let comment_input = document.getElementById("comment-input");
// let erase = function(){comment_input.value = ""};
// comment_input.value = "arr";
// console.log(comment_input.value);
// console.log(comment_input);
let app1 = new Vue({
    el: ".comment-container",
    data: {
        coms: []
    },
    methods: {
        getCom: 
        async function getCom(){
            // event.preventDefault();
            // Cancels the redirection of the link
            if (document.getElementById("comment-input") != null){
                document.getElementById("comment-input").value = "";
            }
            // This line is to avoid problems when trying
            // to hide the input to the visitor. It empties 
            // its value after the comments get modified
                // console.log("aaaaaaaaaaaa"+comment_filter_order.value);
                let url = "../api/models/"+container.id+"/comments?filter="+comment_filter.value+"&order="+comment_filter_order.value;
                console.log(url);
                try{
                    let response = await fetch(url);
                    let data = await response.json();
                    console.log(data);
                    app1.coms = data;
                    // ---------------------------------
                    let o_score = document.querySelector("#overall-score");
                    o_score.innerHTML = 0;
                    let count = 0;
                    for (elem of app1.coms){
                        count += parseInt(elem.puntaje);
                    }
                    if(app1.coms.length > 0){
                        o_score.innerHTML = (count/app1.coms.length).toFixed(2);
                    }
                    else{
                        o_score.innerHTML = 0;
                    }
                }
                catch(error){
                    console.log("error friend! \n"+error);
                }
                // It is not necessary to filtrate less than two comments
                if(app1.coms.length < 2){
                    let filters = document.querySelector("#filters");

                    filters.classList.add("hidden");
                    console.log(filters);
                }
                else{
                    let filters = document.querySelector("#filters");

                    filters.classList.remove("hidden");
                }
            },
        // examExe: 
        //     function example(c){
        //         console.log(c.id_comentario);
        //     },
        deleteCom:
            async function deleteCom(c, x){
                // x is the callback
                event.preventDefault();
                let url = "../api/comments/"+c.id_comentario;
                try{
                    let response = await fetch(url, {
                        method: "DELETE"
                    });
                    let data = await response.json();
                    console.log(data);
                    // app1.coms = data;
                }
                catch(error){
                    console.log("error friend! \n"+error);
                }
                console.log(x);
                x();
                // callback to reset the comments
            },
        addCom:
            async function addCom(callback){
                event.preventDefault();

                let comment_input = document.getElementById("comment-input");
                let comment_score = document.getElementById("comment-score");
                if(comment_input.value != "" && comment_score.value != ""){
                    console.log(comment_input.value);
                    // console.log(container.id);
                    let comment_data = {
                        content: comment_input.value,
                        id: container.id,
                        user_name: userFromNav.innerHTML,
                        score: comment_score.value
                    }
                    let url = "../api/comments";
                    try{
                        let response = await fetch(url, {
                            method: "POST",
                            mode: "cors",
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(comment_data),
                        });
                        let result = await response.json();
                        console.log(result);
                        
                    }
                    catch(error){
                        console.log("error friend! \n"+error);
                        // console.log(com);
                    }
                    console.log(callback);
                    callback();
                    // callback to reset the comments
                }          
            }
    }
})

let comment_filter = document.querySelector("#comment-filter");
let comment_filter_order = document.querySelector("#comment-filter-order");
comment_filter.addEventListener("change", app1.getCom);
comment_filter_order.addEventListener("change", app1.getCom);

// How to sort? in js or ask to the server again?..
// In the server please..

app1.getCom();


// function filtrate(){
//     // let c = comment_filter_order;   
//     app1.getCom();
// }

// app1.getCom();
    // switch(comment_filter.value){
        //     case 'date':
        //         app1.coms.sort((a,b)=>{
    //             let x = a.id_comentario;
    //             let z = b.id_comentario;
    //             c.children[0].innerHTML = "Ascendente";
    //             c.children[1].innerHTML =  "Descendente";
    //             return c.value == "asc"? x-z: z-x;
    //             // return x-z;
    //         });
    //         console.log("By date:");
    //         console.log(app1.coms);  
    //     break;
    //     case 'score':
    //         app1.coms.sort((a,b)=>{
    //             let q = a.puntaje;
    //             let w = b.puntaje;
    //             c.children[0].innerHTML = "Mayor a menor";
    //             c.children[1].innerHTML =  "Menor a mayor";
    //             return c.value == "asc"? w-q: q-w;
    //         })
    //         // k = "incredible";
    //         // console.log(k);
    //         console.log("By score:");
    //         console.log(app1.coms);
    //     break;
    //     case 'user':
    //         app1.coms.sort((a,b)=>{
    //             i = a.nombre_usuario.toLowerCase();
    //             p = b.nombre_usuario.toLowerCase();
    //             c.children[0].innerHTML = "A - Z";
    //             c.children[1].innerHTML =  "Z - A";
    //             if(c.value == "asc"){
    //                 return i>p? 1: i<p? -1: 0;
    //             }
    //             else{
    //                 return i>p? -1: i<p? 1: 0;
    //             }
    //             // return i-p;   
    //         })
    //         console.log("By user:");
    //         console.log(app1.coms);
    //         // console.log(new Date())
    //     break;
    // }


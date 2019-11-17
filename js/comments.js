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
                let url = "../api/comments/"+container.id;
                try{
                    let response = await fetch(url);
                    let data = await response.json();
                    console.log(data);
                    app1.coms = data;
                }
                catch(error){
                    console.log("error friend! \n"+error);
                }
            },
        // examExe: 
        //     function example(c){
        //         console.log(c.id_comentario);
        //     },
        deleteCom:
            async function deleteCom(c, x){
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
                console.log(comment_input.value);
                // console.log(container.id);
                let comment_data = {
                    content: comment_input.value,
                    id: container.id,
                    user_name: userFromNav.innerHTML
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
})

app1.getCom();


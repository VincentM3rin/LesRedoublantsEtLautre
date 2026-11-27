const connect = document.querySelector("#connect");
const create = document.querySelector("#create")

console.log(connect)
console.log(create)

connect.addEventListener("click", toggleConnect)
create.addEventListener("click", toggleCreate)

function toggleConnect(){
    connect.classList.toggle("active")
    create.classList.toggle("desactive")
}

function toggleCreate(){
    create.classList.toggle("active")
    connect.classList.toggle("desactive")
}

/*  
    Petit problème, si on clique deux fois sur la div, la deuxième div reprends son opacité à 1.
    Et si on clique sur une div transparente, l'autre div devient transparente ou opaque mais
    ne rends pas la div cliquée opaque.
    Pour eviter cela, regarder Add/Remove d'après Giroud.

*/

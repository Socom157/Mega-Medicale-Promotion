let NAV=document.getElementById("nav")
let BUTT=document.getElementById("bouton")
let FERME=document.getElementById("fermer")

NAV.classList.add("cache")
BUTT.classList.add("affiche")


BUTT.addEventListener("click" ,() =>{
    BUTT.classList.add("cache")
    NAV.classList.remove("cache")
    NAV.classList.add("affiche")

})

FERME.addEventListener("click",()=>{
    BUTT.classList.remove("cache")
    BUTT.classList.add("affiche")
    NAV.classList.remove("affiche")
    NAV.classList.add("cache")

})
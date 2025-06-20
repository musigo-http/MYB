/*document.getElementById("btnokay").addEventListener("click", function(){
    document.getElementById("scrollbar").style
})*/
let i = 25;
let end = 100;
let steps = end - i + 1;
let totalDuration = 1000; 
let delay = totalDuration / steps;

function agrandir() {
    document.getElementById("backgroundblack").style.width = i + "%";
    i++;
    if (i <= end) {
        setTimeout(agrandir, delay);
    }
}
//faire un btn des qu'on appuis sa declanche l'annimation et sa change le texte du bouton pour reqliquer dessu une deuxiemme fois pour passer a la page suivante

var btn_next = document.getElementById("btn_next").addEventListener("click", function(){
    agrandir();
});
const burgerButton = document.querySelector("header > nav > button"); //sélectionne le burger button
const nav = document.querySelector("header > nav"); //sélectionne la navigation principale

burgerButton.addEventListener("click", () => nav.classList.toggle("active"))
//au clique sur le burger button, ajoute la classe active à la avigation principale pour ensuite modifier ses propriété en css (et donc ouvrir le menu)

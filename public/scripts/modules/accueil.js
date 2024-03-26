const sliderButtonLeft = document.querySelector('.slider .buttons > button:first-child'); //sélectionne la flèche gauche du slider 
const sliderButtonRight = document.querySelector('.slider .buttons > button:last-child'); //sélectionne la flèche droite du slider 
const slides = document.querySelectorAll('.slider .slides article'); //sélectionne toutes les slides 

let currentSlideIndex = 0; //initialise une varibale qui serra l'index courrant de la slide visible 

let sliderInterval = setInterval(() => {
    //créé un interval qui appelle la fonction de changement de slide toute les 3000ms
    changeSlide()
}, 3000)

sliderButtonLeft.addEventListener('click', () => handleSliderButtonsClick(true)) 
sliderButtonRight.addEventListener('click', () => handleSliderButtonsClick())
//au clique sur les flèches, appelle la fonction qui gère les cliques du slider

const handleSliderButtonsClick = (backward = false) => {
    //fonction appelé au clique sur les flèches
    //permet d'enlever l'interval et appèle la fonction de changement de slide
    clearInterval(sliderInterval);
    changeSlide(backward)
}

const changeSlide = (backward = false) => {
    //fonction qui gère le changement de slide

    slides[currentSlideIndex].classList.remove('currentSlide') //enlève la classe currentSlide sur la slide actuel
    
    if (backward) {
        //si l'option est true, la slide active sera la précédente (ou la dernière si l'index est 0)
        currentSlideIndex = currentSlideIndex - 1 < 0 ? slides.length - 1 : currentSlideIndex - 1
    } else {
        //sinon, la slide active sera la suivante (ou la première si l'index est égale aux nombre de slides)
        currentSlideIndex = currentSlideIndex + 1 >= slides.length ? 0 : currentSlideIndex + 1
    }

    slides[currentSlideIndex].classList.add('currentSlide') //ajoute la classe currentSlide sur la nouvelle slide actuel
} 

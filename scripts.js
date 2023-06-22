let showMovieIndex = {};
let showProductIndex = {};
let slideContainersMovie = document.getElementsByClassName('slideshow-container-movie');
let slideContainersProduct = document.getElementsByClassName('slideshow-container-product');

for (let i=0; i<slideContainersMovie.length; i++){
    showMovieIndex[slideContainersMovie[i].getAttribute('id')] = [0,1,2];
    showSlides(displayClass="slide-item", showIndexList = showMovieIndex[slideContainersMovie[i].getAttribute('id')], slideContainerId = slideContainersMovie[i].getAttribute('id'));
};

for (let i=0; i<slideContainersProduct.length; i++){
    showProductIndex[slideContainersProduct[i].getAttribute('id')] = [0,1,2,3];
    showSlides(displayClass="slide-item", showIndexList = showProductIndex[slideContainersProduct[i].getAttribute('id')], slideContainerId = slideContainersProduct[i].getAttribute('id'));
};

function move(arrAll, arrShow, step){
    let no_show = arrShow.length;
    let res = [...arrShow];
    for (let i = 0; i < no_show; i++){
        if (arrShow[i]+step < 0){
            res[i] = arrShow[i] + step + arrAll.length;
        }
        else if (arrShow[i]+step >= arrAll.length){
            res[i] = arrShow[i] + step - arrAll.length;
        }
        else{
            res[i] = arrShow[i] + step;
        }
    }
    return res;
}

function slideMoveMovie(step, slideContainerId){
    allIndexList = [...Array(document.getElementById(slideContainerId).getElementsByClassName('slide-item').length).keys()];
    showMovieIndex[slideContainerId] = move(allIndexList,showMovieIndex[slideContainerId], step);
    showSlides(displayClass="slide-item", showIndexList = showMovieIndex[slideContainerId], slideContainerId = slideContainerId);
}


function slideMoveProduct(step, slideContainerId){
    allIndexList = [...Array(document.getElementById(slideContainerId).getElementsByClassName('slide-item').length).keys()];;
    showProductIndex[slideContainerId] = move(allIndexList,showProductIndex[slideContainerId], step);
    showSlides(displayClass="slide-item", showIndexList = showProductIndex[slideContainerId], slideContainerId = slideContainerId);
}

function showSlides(displayClass, showIndexList, slideContainerId) {
    const slides = document.getElementById(slideContainerId).getElementsByClassName('slide-item');
    console.log(slides);
    for (let i = 0; i < slides.length; i++) {
        if(showIndexList.includes(i)){
            slides[i].className = displayClass;    
        }
        else{
            slides[i].className = displayClass + " " + "none-display";
        }
    }   
}
var gallerie = document.getElementById('pageRealisation');
var modal = document.getElementById('bgGrandeImageRealisation');
var grandeimg = document.getElementById('grandeimg');
var closeBtn = document.getElementById('closeBtn');


function clickSurImg(event) {
 var imgClick = event.target;
 grandeimg.src = imgClick.src;
 modal.style.display = "block";
}
function closeModal(event) {
 modal.style.display = "none";
}
gallerie.addEventListener('click', clickSurImg, false);
modal.addEventListener('click', closeModal, false);



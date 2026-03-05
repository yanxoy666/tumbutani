function loadPage(page){

fetch(page)
.then(response => response.text())
.then(data => {

document.getElementById("main-content").innerHTML = data;

});

}
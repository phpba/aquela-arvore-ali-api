var x = document.getElementById("map");
var btn = document.getElementById("add-tree");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, error);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
    x.innerHTML ='<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1374.5104605510326!2d'+lon+'!3d'+lat+'!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1482434689868" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>';
}

function error(data){
    console.log("error", data);
}

function addTree() {
    alert("Ha! Pegadinha do malandro!");
}

(function(){
    btn.addEventListener("click", function(){
        addTree();
    });
    getLocation();
})();

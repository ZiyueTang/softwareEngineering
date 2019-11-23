var images;
var index = 0;
var num_of_img;

window.onload = function() {
    images = document.querySelectorAll("#slideshow img");
    num_of_img = document.getElementById("img_count").innerHTML;
    if(num_of_img > 1){
        setInterval(slide, 2500);
    }
};

function slide(){
    images[(index+1)%num_of_img].style.zIndex = 3;
    images[index].style.zIndex = 2;
    images[(index+1)%num_of_img].style.opacity = 1;
    images[index].style.zIndex = 1;
    images[index].style.opacity = 0;
    
    index = (index+1)%num_of_img;
    //console.log(index);
}
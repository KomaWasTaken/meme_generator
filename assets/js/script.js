M.AutoInit();

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });

var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
};
var output = document.getElementById('output');
var gallery = document.querySelectorAll('.gallery');
for (i=0; i<gallery.length; i++){
    gallery[i].addEventListener('click', function(){
        var img = this.src;
        output.src = img;
})

}

/* Smooth Scrolling */

$('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if( target.length) {
        event.preventDefault();

        var scroll = target.offset().top;
        $('html, body').stop().animate({
            scrollTop: scroll
        }, 1000);
    }
});

/* Button copy to clipboard pour l'url */

var urltoCopy = $('#lienImage'),
    buttonToCopy = $('#buttonCopy');

buttonToCopy.click(function(){
  urltoCopy.select();
if(document.execCommand('copy')){
    buttonToCopy.addClass('copied');
    }
return false;
});



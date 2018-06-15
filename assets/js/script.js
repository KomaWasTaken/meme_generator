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
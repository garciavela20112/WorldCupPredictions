

documennt.getElementById("scrollmenu").onclick = function() {removingElement()}


function adjustCS() {
    "use strict";
    
    var element = document.getElementsByClassName("scrollmenu");
    element.parentNode.removeChild(element);
}

var object = document.getElementByClassName("scrollmenu");
object.onclick = function() { };


function removingElement() {
    documennt.getElementById("scrollmenu").parentElement.removeChild(documennt.getElementById("scrollmenu"));
    
}
</script> 
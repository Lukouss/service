/**
 * 
 */
function encodeImageFileAsURL(){
        /*
        obtiene la imagen desde el input, para posteriormente procesarla 
        usando FileReader y encodear' la imagen en base64
        */
        var filesSelected = document.getElementById("inputImagen").files;
        if (filesSelected.length > 0)
        {
            var fileToLoad = filesSelected[0];

            var fileReader = new FileReader();// lee el contenido de fileToLoad

            fileReader.onload = function(fileLoadedEvent) {
                var srcData = fileLoadedEvent.target.result; // <--- data:image base64

                var newImage = document.createElement('img'); //elemento img
                newImage.src = srcData;

                document.getElementById("imgContainer").innerHTML = newImage.outerHTML;
                document.getElementById("textArea").innerHTML = newImage.src;
            }
            fileReader.readAsDataURL(fileToLoad);
        }
    }

function decodeImageURLAsFile(){
    document.getElementById("imgContainer").innerHTML = window.atob(encodeImageFileAsURL());
}

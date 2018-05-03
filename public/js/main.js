function displayCheckDelete(route, nameUser){
    var answer = confirm("Souhaitez-vous vraiment supprimer " + nameUser + " ?")
    if(answer){
        window.location.replace(route);
    }
}

function show(aval) {
  if (aval == "Don") {
    hiddenDiv.style.display='inline-block';
    Form.fileURL.focus();
  } 
  else{
    hiddenDiv.style.display='none';
  }
}
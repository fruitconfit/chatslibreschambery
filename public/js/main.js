function displayCheckDelete(route, nameUser){
    var answer = confirm("Souhaitez-vous vraiment supprimer " + nameUser + " ?")
    if(answer){
        window.location.replace(route);
    }
}
function showRecuCheckbox() {
    // Get the input
    var input = document.getElementById("don");
    // Get the output checkbox
    var check = document.getElementById("checkrecu");
  
    // If the input is selected, display the output checkbox
    if (input.selected == true){
      check.style.display = "block";
    } else {
      check.style.display = "none";
    }
  } 
function displayCheckDelete(route, nameUser){
    var answer = confirm("Souhaitez-vous vraiment supprimer " + nameUser + " ?")
    if(answer){
        window.location.replace(route);
    }
}

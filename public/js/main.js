function displayCheckDelete(route){
    var answer = confirm("Souhaitez-vous vraiment supprimer l'utilisateur ?")
    if(answer){
        window.location.replace(route);
    }
}
function displayCheckDelete(id){
    var answer = confirm("Souhaitez-vous vraiment supprimer l'utilisateur ?")
    if(answer){
        window.location.replace("../admin/users/delete/"+id);
    }
}
function displayCheckDelete(id){
    var answer = confirm("Souhaitez-vous vraiment supprimer l'utilisateur ?")
    if(answer){
        window.location.replace(((window.location.href).substring(0,(window.location.href).search('/public/')+8))+"admin/users/delete/"+id); //Creation URL with base URL
    }
}
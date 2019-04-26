function verifDate(champ){

    var dateJour = new Date();
    var strDate = champ.value;
    if(strDate && isDateValid(strDate)){
        var splitDate = strDate.split("-");
        if(splitDate.length == 3){
            var maDate = new Date(eval(splitDate[0]),eval(splitDate[1])-1,eval(splitDate[2]));
            if(maDate<=dateJour){
                // Date passée ou aujourd'hui
                // Exemple : Nous sommes le 23/10/2012 et la date saisie est le 22/10/2012
            }else{
                // Date à venir
                // Exemple : Nous sommes le 23/10/2012 et la date saisie est le 24/10/2012
            }
        }
    }

}​
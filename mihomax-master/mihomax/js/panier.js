function faireAchat(){
	var i=0;
	var numb="";
	var requet="panier.php?action=acheter";
	while ((numb=document.getElementsByClassName("nb"+i)[0])!== undefined){
		requet+="&q[]="+numb.value;
		i++;
	}
	return location.href = requet;
}
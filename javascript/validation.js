function validerCin(){
//recuperer le champ ayant id="cin"
	cin=document.getElementById('cin');
	erreur=document.getElementById("erreur");
//recuperer sa valeur
vcin=cin.value
//creer un modele de cin 
mcin= /^[a-z]{1,2}[0-9]{6}$/
// tester la valeur par le modele
if (mcin.test(vcin)) {
	//alert("ok")
erreur.innerHTML="Cin  correct"
erreur.style.color = 'green';
}else {
	erreur.innerHTML="Cin n'est pas correct";
	erreur.style.color = 'red';

}

}
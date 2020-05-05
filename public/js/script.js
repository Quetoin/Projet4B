var widthTiny = 1000;
var isBurgerDisplayed = 0;
var isCommentsDisplayed = 0;



// Définit la taille des éléments tinyMCE en fonction de la taille de l'écran
function getTinySize(){
	if(window.innerWidth >= 1380){
		widthTiny = 1000;
	}else if(window.innerWidth < 1380 && window.innerWidth >= 1080){
		widthTiny = 760;
	}else if(window.innerWidth < 1080 && window.innerWidth >= 800){
		widthTiny = 580;
	}else if(window.innerWidth < 800 && window.innerWidth >= 640){
		widthTiny = 550;
	}else if(window.innerWidth < 640 && window.innerWidth >= 450){
		widthTiny = 430;
	}else if(window.innerWidth < 450){
		widthTiny = 300;
	}
}

getTinySize();



// Gère le menu burger sur la version mobile
function animationBurger(x) {

  x.classList.toggle("change");

  var linkBurger = document.getElementById("linksBurger");
  var container = document.getElementById("containerBurger");

  if(!isBurgerDisplayed){

  	linkBurger.style.display = "flex";
  	isBurgerDisplayed = 1;
  	container.style.backgroundColor = "rgba(41,70,100,1)";

  }else{

  	linkBurger.style.display = "none";
  	isBurgerDisplayed = 0;
  	container.style.backgroundColor = "rgba(52,58,64,1)";

  }
  
} 



// Initialise tinyMCE sur les input qui ont comme class "editable" avec certains plugins.
	tinymce.init({
    		selector: "input.editable",
    		width: widthTiny,
		    height: 500,
		    plugins: [
		      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
		      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
		      'table emoticons template paste help'
		    ],
		    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
		      'bullist numlist outdent indent | link image | print preview media fullpage | ' +
		      'forecolor backcolor emoticons | help',
		    menu: {
		      favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
		    },
		    menubar: 'favs file edit view insert format tools table help',
		    content_css: 'css/content.css'
    	});


// Gère l'affichage des commentaires sur un article
function displayComments(){

	if(!isCommentsDisplayed){
		document.getElementById("comments").style.display = "flex";
		document.getElementById("buttonDisplayComments").innerHTML ="Cacher les commentaires";
		isCommentsDisplayed = 1;
	}else{
		document.getElementById("comments").style.display = "none";
		document.getElementById("buttonDisplayComments").innerHTML ="Afficher les commentaires";
		isCommentsDisplayed = 0;
	}
	
}
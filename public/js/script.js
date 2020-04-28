var viewFormComment = false;

var widthTiny = 1000;


function getTinySize(){
	if(window.innerWidth >= 1200){
		widthTiny = 1000;
	}else if(window.innerWidth < 1200 && window.innerWidth >= 800){
		widthTiny = 750;
	}else if(window.innerWidth < 800 && window.innerWidth >= 600){
		widthTiny = 550;
	}else if(window.innerWidth < 600){
		widthTiny = 300;
	}
}


getTinySize();


	tinymce.init({
    		selector: "input.editable",
    		width: widthTiny,
		    height: 300,
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

var isDisplayed = 0;


function displayComments(){

	if(!isDisplayed){
		document.getElementById("comments").style.display = "flex";
		document.getElementById("buttonDisplayComments").innerHTML ="Cacher les commentaires";
		isDisplayed = 1;
	}else{
		document.getElementById("comments").style.display = "none";
		document.getElementById("buttonDisplayComments").innerHTML ="Afficher les commentaires";
		isDisplayed = 0;
	}
	
}
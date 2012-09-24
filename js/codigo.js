//*/Funcionamiento menú*/
$(document).ready(function() {
						   
    var hash = window.location.hash.substr(1); //obtiene el hash ej !about
        
    var href = $('nav li a').each(function(){
        var href = "!"+$(this).attr('href'); 
        //                alert("href "+href.substr(0,href.length-5));
        //                alert("hash "+hash);
        if(hash==href.substr(0,href.length-5)){
            var toLoad = hash.substr(1)+'.html .main-box'; //carga la pagina quitando al hash el !
            //                        alert(toLoad);
            $('.main-box').load(toLoad)
        }											
    });

    $('nav li a').click(function(){ //el usuario hace click en el menu
								  
        var toLoad = $(this).attr('href')+' .main-box';//obtiene los datos para cargarlo en el DIV ej about.html#content
        //alert(toLoad); 
        $('.main-box').hide('fast',loadContent); // oculta la capa #contenct y carga la funcion loadContent
        $('#load').remove();
        $('#wrapper').append('<span id="load">LOADING...</span>'); //efecto al cargar datos en el div
        $('#load').fadeIn('normal');//efecto mostrar arriva hacia abajo
        window.location.hash = "!"+$(this).attr('href').substr(0,$(this).attr('href').length-5); //obtiene la pagina con # y ! para rastrearla
        //		 window.location.hash = "!hola";
        //		alert($(this).attr('href').substr(0,$(this).attr('href').length-1));
        function loadContent() {
            $('.main-box').load(toLoad,'',showNewContent())// obtiene la pagia solicitada y llama la funcion showNweContent
        }
        function showNewContent() {
            $('.main-box').show('normal',hideLoader()); // hace el nuevo pedido que aparecera dentro de #content
        }
        function hideLoader() {
            $('#load').fadeOut('normal'); // efecto mostrar de abajo hacia arriva
        }
        return false;
		
    });


    // Fin Funcionamiento Menu//
            
    //Scritp Menu galeria//
           
    
});         //Fin Scritp Menu galeria//
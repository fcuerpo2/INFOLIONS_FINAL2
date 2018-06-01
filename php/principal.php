<?php
header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT'); // Fecha en el pasado
include '../lib/lib1.php';
if (session_id() === '') { session_start(); }
$_SESSION['MisTags']=array();
if($_SESSION['usu']['idUsuario']!=""){

  $nombre=$_SESSION['usu']['Nombre'];
  $apellidos=$_SESSION['usu']['Apellidos'];

 //creamos la consulta de seleccion del tag y le damos formato 
       //JSON Y LA RETORNAMOS
    $consulta="SELECT * FROM Tags INNER JOIN usuarios ON Tags.idUsuario=usuarios.idUsuario order by Tags.Fecha DESC";

    conectarBD();
    $miArray = array();

    if ($resultado= $conexion->query($consulta)) {

    while($row = $resultado->fetch_assoc()) {
            $miArray[] = $row;
            $_SESSION['MisTags'][] = $row;
    }
  }
    desconectarBD();

echo "
<html lang='es'>
<head>
	<title>InfoLions</title>
	<link rel='shortcut icon' type='image/x-icon' href='../img/favicon.ico'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta http-equiv='Pragma' content='no-cache'>
	<meta http-equiv='Expires' content='-1'>
	<!-- parte modificada por edgar -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js'></script>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js'></script>

    <script src='../js/script1.js'></script>
    <link rel='stylesheet' href='../css/estilo1.css'>
    <script src='../chat/chat.js'></script>
    <link href='../chat/chat.css' rel='stylesheet'/>



<style>
.image-upload > input{
    visibility: hidden;
    width:0px;
    height:0px;
}
</style>
<script>";
?>
var defaults = {
    // Enable infinite gallery navigation
    loop: false,

    // Horizontal space between slides
    gutter: 50,

    // Enable keyboard navigation
    keyboard: true,

    // Should display navigation arrows at the screen edges
    arrows: true,

    // Should display counter at the top left corner
    infobar: true,

    // Should display close button (using `btnTpl.smallBtn` template) over the content
    // Can be true, false, "auto"
    // If "auto" - will be automatically enabled for "html", "inline" or "ajax" items
    smallBtn: "auto",

    // Should display toolbar (buttons at the top)
    // Can be true, false, "auto"
    // If "auto" - will be automatically hidden if "smallBtn" is enabled
    toolbar: "auto",

    // What buttons should appear in the top right corner.
    // Buttons will be created using templates from `btnTpl` option
    // and they will be placed into toolbar (class="fancybox-toolbar"` element)
    buttons: [
        "zoom",
        //"share",
        //"slideShow",
        //"fullScreen",
        //"download",
        "thumbs",
        "close"
    ],

    // Detect "idle" time in seconds
    idleTime: 3,

    // Disable right-click and use simple image protection for images
    protect: false,

    // Shortcut to make content "modal" - disable keyboard navigtion, hide buttons, etc
    modal: false,

    image: {
        // Wait for images to load before displaying
        //   true  - wait for image to load and then display;
        //   false - display thumbnail and load the full-sized image over top,
        //           requires predefined image dimensions (`data-width` and `data-height` attributes)
        preload: false
    },

    ajax: {
        // Object containing settings for ajax request
        settings: {
            // This helps to indicate that request comes from the modal
            // Feel free to change naming
            data: {
                fancybox: true
            }
        }
    },

    iframe: {
        // Iframe template
        tpl:
            '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>',

        // Preload iframe before displaying it
        // This allows to calculate iframe content width and height
        // (note: Due to "Same Origin Policy", you can't get cross domain data).
        preload: true,

        // Custom CSS styling for iframe wrapping element
        // You can use this to set custom iframe dimensions
        css: {},

        // Iframe tag attributes
        attr: {
            scrolling: "auto"
        }
    },

    // Default content type if cannot be detected automatically
    defaultType: "image",

    // Open/close animation type
    // Possible values:
    //   false            - disable
    //   "zoom"           - zoom images from/to thumbnail
    //   "fade"
    //   "zoom-in-out"
    //
    animationEffect: "zoom",

    // Duration in ms for open/close animation
    animationDuration: 366,

    // Should image change opacity while zooming
    // If opacity is "auto", then opacity will be changed if image and thumbnail have different aspect ratios
    zoomOpacity: "auto",

    // Transition effect between slides
    //
    // Possible values:
    //   false            - disable
    //   "fade'
    //   "slide'
    //   "circular'
    //   "tube'
    //   "zoom-in-out'
    //   "rotate'
    //
    transitionEffect: "fade",

    // Duration in ms for transition animation
    transitionDuration: 366,

    // Custom CSS class for slide element
    slideClass: "",

    // Custom CSS class for layout
    baseClass: "",

    // Base template for layout
    baseTpl:
        '<div class="fancybox-container" role="dialog" tabindex="-1">' +
        '<div class="fancybox-bg"></div>' +
        '<div class="fancybox-inner">' +
        '<div class="fancybox-infobar">' +
        "<span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span>" +
        "</div>" +
        '<div class="fancybox-toolbar">{{buttons}}</div>' +
        '<div class="fancybox-navigation">{{arrows}}</div>' +
        '<div class="fancybox-stage"></div>' +
        '<div class="fancybox-caption"></div>' +
        "</div>" +
        "</div>",

    // Loading indicator template
    spinnerTpl: '<div class="fancybox-loading"></div>',

    // Error message template
    errorTpl: '<div class="fancybox-error"><p>{{ERROR}}</p></div>',

    btnTpl: {
        download:
            '<a download data-fancybox-download class="fancybox-button fancybox-button--download" title="{{DOWNLOAD}}" href="javascript:;">' +
            '<svg viewBox="0 0 40 40">' +
            '<path d="M13,16 L20,23 L27,16 M20,7 L20,23 M10,24 L10,28 L30,28 L30,24" />' +
            "</svg>" +
            "</a>",

        zoom:
            '<button data-fancybox-zoom class="fancybox-button fancybox-button--zoom" title="{{ZOOM}}">' +
            '<svg viewBox="0 0 40 40">' +
            '<path d="M18,17 m-8,0 a8,8 0 1,0 16,0 a8,8 0 1,0 -16,0 M24,22 L31,29" />' +
            "</svg>" +
            "</button>",

        close:
            '<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}">' +
            '<svg viewBox="0 0 40 40">' +
            '<path d="M10,10 L30,30 M30,10 L10,30" />' +
            "</svg>" +
            "</button>",

        // This small close button will be appended to your html/inline/ajax content by default,
        // if "smallBtn" option is not set to false
        smallBtn:
            '<button data-fancybox-close class="fancybox-close-small" title="{{CLOSE}}"><svg viewBox="0 0 32 32"><path d="M10,10 L22,22 M22,10 L10,22"></path></svg></button>',

        // Arrows
        arrowLeft:
            '<a data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}" href="javascript:;">' +
            '<svg viewBox="0 0 40 40">' +
            '<path d="M18,12 L10,20 L18,28 M10,20 L30,20"></path>' +
            "</svg>" +
            "</a>",

        arrowRight:
            '<a data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}" href="javascript:;">' +
            '<svg viewBox="0 0 40 40">' +
            '<path d="M10,20 L30,20 M22,12 L30,20 L22,28"></path>' +
            "</svg>" +
            "</a>"
    },

    // Container is injected into this element
    parentEl: "body",

    // Hide browser vertical scrollbars; use at your own risk
    hideScrollbar: true,

    // Focus handling
    // ==============

    // Try to focus on the first focusable element after opening
    autoFocus: false,

    // Put focus back to active element after closing
    backFocus: true,

    // Do not let user to focus on element outside modal content
    trapFocus: true,

    // Module specific options
    // =======================

    fullScreen: {
        autoStart: false
    },

    // Set `touch: false` to disable dragging/swiping
    touch: {
        vertical: true, // Allow to drag content vertically
        momentum: true // Continue movement after releasing mouse/touch when panning
    },

    // Hash value when initializing manually,
    // set `false` to disable hash change
    hash: null,

    // Customize or add new media types
    // Example:
    /*
        media : {
            youtube : {
                params : {
                    autoplay : 0
                }
            }
        }
    */
    media: {},

    slideShow: {
        autoStart: false,
        speed: 4000
    },

    thumbs: {
        autoStart: false, // Display thumbnails on opening
        hideOnClose: true, // Hide thumbnail grid when closing animation starts
        parentEl: ".fancybox-container", // Container is injected into this element
        axis: "y" // Vertical (y) or horizontal (x) scrolling
    },

    // Use mousewheel to navigate gallery
    // If 'auto' - enabled for images only
    wheel: "auto",

    // Callbacks
    //==========

    // See Documentation/API/Events for more information
    // Example:
    /*
        afterShow: function( instance, current ) {
            console.info( 'Clicked element:' );
            console.info( current.opts.$orig );
        }
    */

    onInit: $.noop, // When instance has been initialized

    beforeLoad: $.noop, // Before the content of a slide is being loaded
    afterLoad: $.noop, // When the content of a slide is done loading

    beforeShow: $.noop, // Before open animation starts
    afterShow: $.noop, // When content is done loading and animating

    beforeClose: $.noop, // Before the instance attempts to close. Return false to cancel the close.
    afterClose: $.noop, // After instance has been closed

    onActivate: $.noop, // When instance is brought to front
    onDeactivate: $.noop, // When other instance has been activated

    // Interaction
    // ===========

    // Use options below to customize taken action when user clicks or double clicks on the fancyBox area,
    // each option can be string or method that returns value.
    //
    // Possible values:
    //   "close"           - close instance
    //   "next"            - move to next gallery item
    //   "nextOrClose"     - move to next gallery item or close if gallery has only one item
    //   "toggleControls"  - show/hide controls
    //   "zoom"            - zoom image (if loaded)
    //   false             - do nothing

    // Clicked on the content
    clickContent: function(current, event) {
        return current.type === "image" ? "zoom" : false;
    },

    // Clicked on the slide
    clickSlide: "close",

    // Clicked on the background (backdrop) element;
    // if you have not changed the layout, then most likely you need to use `clickSlide` option
    clickOutside: "close",

    // Same as previous two, but for double click
    dblclickContent: false,
    dblclickSlide: false,
    dblclickOutside: false,

    // Custom options when mobile device is detected
    // =============================================

    mobile: {
        idleTime: false,
        clickContent: function(current, event) {
            return current.type === "image" ? "toggleControls" : false;
        },
        clickSlide: function(current, event) {
            return current.type === "image" ? "toggleControls" : "close";
        },
        dblclickContent: function(current, event) {
            return current.type === "image" ? "zoom" : false;
        },
        dblclickSlide: function(current, event) {
            return current.type === "image" ? "zoom" : false;
        }
    },

    // Internationalization
    // ====================

    lang: "en",
    i18n: {
        en: {
            CLOSE: "Close",
            NEXT: "Next",
            PREV: "Previous",
            ERROR: "The requested content cannot be loaded. <br/> Please try again later.",
            PLAY_START: "Start slideshow",
            PLAY_STOP: "Pause slideshow",
            FULL_SCREEN: "Full screen",
            THUMBS: "Thumbnails",
            DOWNLOAD: "Download",
            SHARE: "Share",
            ZOOM: "Zoom"
        },
        de: {
            CLOSE: "Schliessen",
            NEXT: "Weiter",
            PREV: "Zurück",
            ERROR: "Die angeforderten Daten konnten nicht geladen werden. <br/> Bitte versuchen Sie es später nochmal.",
            PLAY_START: "Diaschau starten",
            PLAY_STOP: "Diaschau beenden",
            FULL_SCREEN: "Vollbild",
            THUMBS: "Vorschaubilder",
            DOWNLOAD: "Herunterladen",
            SHARE: "Teilen",
            ZOOM: "Maßstab"
        }
    }
};
<?php
echo "</script>
</head>
<body onload='cargarmuro()'>
<center>
<div id='cabecera'>
  <nav class='navbar navbar-inverse'>
    <div class='container-fluid'>
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href='principal.php'><img src='../img/reservoir.png' alt='InfoLions' title='InfoLions' style='height: 25px; width: 25px; display: initial;'>&nbsp;&nbsp;&nbsp;&nbsp;INFOLIONS</a>
        </div>
        <div class='collapse navbar-collapse' id='myNavbar'>
            <ul class='nav navbar-nav'>
                <li><a href='./principal.php'>Home</a></li>
                <li><a href='./contactos.php'>Contactos</a></li>
                <li><a href='#' onclick='nuevoAnuncio();'>Agregar Anuncio</a></li>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='#' onclick='miperfil();'><span class='glyphicon glyphicon-user'></span> Bienvenido $nombre $apellidos</a></li>
                <li><a href='#' onclick='salir();'><span class='glyphicon glyphicon-log-in'></span> Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
  </nav> 
</div>

   	<div class='row' style='margin: 0 auto;'>
  		<div class='col-md-3' style='margin-top: 5px; margin-bottom: 5px;'>
                        <div id='michat' style='background-color: #333; min-height: 40px; margin-bottom: 10px; border-radius: 10px;' class='sombraNegra'>
                                    <div id='EspacioChat' style='max-height:350px; overflow: auto; padding: 0px 10px;'>
                                    <div class='chat'";
        	
        		$_SESSION['user']=$_SESSION['usu']['Nombre']." ".$_SESSION['usu']['Apellidos'];
        		include("../chat/config.php");
        		include("../chat/login.php");
          		if(isset($_SESSION['user'])){
              		include("../chat/chatbox.php");
          		}else{	
              		$display_case=true;
              		include("../chat/login.php");
          		}
        	
 echo"                              </div>
                                </div>  
                                    <form id='msg_form'>
                                        <input name='msg' type='text' placeholder='Mensaje...' style='border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;' />
                                    </form>
	                </div>                        
  		  	<div id='geolocalizacion' style='background-color: #ccc; min-height: 40px; margin-bottom: 10px; border-radius: 10px;'></div>
  		  	<div id='anuncio-left' style='background-color: #333; min-height: 40px; margin-bottom: 10px; border-radius: 10px;'></div>
  		</div>
  		<div class='col-md-6' style='margin-top: 5px; margin-bottom: 5px;'>
  		   	<div id='anuncio-top' style='background-color: #0e5f0e; margin-bottom: 20px; border-radius: 10px; padding: 10px; color: #fff;' class='sombraNegra'>";

include "../ANUNCIOS/anuncioInicioBlanco.php";

echo "                  </div>
   			<div id='imagen'></div>";
if ($_SESSION['usu']['FotoFondo'] == "")
{
echo "   			<div id='perfiles' class='sombraNegra'></div>";
}
else
{
    $nombre_fondo = '../doc/fotofondo/'.$_SESSION['usu']['FotoFondo'];
    if (file_exists($nombre_fondo)) 
        {
echo "   			<div id='perfiles' class='sombraNegra' style='background-image: url(../doc/fotofondo/".$_SESSION['usu']['FotoFondo']."); background-repeat: no-repeat; background-size: cover;'></div>";        
        }
    else
        {
echo "   			<div id='perfiles' class='sombraNegra'></div>";        
        }
}
echo "   			<div id='tags'>";
include './dibujartags.php';
echo "		</div>           
		</div>
                
  		<div class='col-md-3' style='margin-top: 5px; margin-bottom: 5px;'>
  		  		<div id='grupos' style='background-color: #ccc; min-height: 40px; margin-bottom: 10px; border-radius: 10px;'></div>
  			 	<div id='anuncio-right' style='background-color: #333; min-height: 40px; margin-bottom: 10px; border-radius: 10px;'></div>
  		</div>
  	</div>		        
	</center>";
}
else{
  header("location: ../index.php");
}
?>
</body>
</html>

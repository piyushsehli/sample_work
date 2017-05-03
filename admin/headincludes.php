<!DOCTYPE html>
<head>
	<html lang="en">
	<meta charset="utf-8">
	<title>Techshark</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Sakaar Microsolutions Pvt. Ltd.">

	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	  	ul {
		  list-style: none;
		}
		ul .inner {
		  /*padding-left: 1em;*/
		  overflow: hidden;
		  display: none;
		}
		ul .inner.show {
		  /*display: block;*/
		}
		ul li {
		  /*margin: .5em 0;*/
		}
		ul.inner li{
			padding:5px 0px;
		}
		ul.inner li a{
			text-decoration: none;
		}
		ul li a.toggle {
		  /*width: 100%;*/
		  display: block;
		  /*padding: .75em;
		  border-radius: 0.15em;*/
		  transition: background .3s ease;
		}
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>
	<link href='css/own.css' rel='stylesheet'>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.toggle').click(function(e) {
		  	e.preventDefault();
		  
		    var $this = $(this);
		  
		    if ($this.next().hasClass('show')) {
		        $this.next().removeClass('show');
		        $this.next().slideUp(350);
		    } else {
		        $this.parent().parent().find('li .inner').removeClass('show');
		        $this.parent().parent().find('li .inner').slideUp(350);
		        $this.next().toggleClass('show');
		        $this.next().slideToggle(350);
		    }
			});
		});
	</script>
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		function calamount()
		{
			var a, b, c;
			a = document.newdiesel.quantity.value;
			b = document.newdiesel.rateperltr.value;
			c = a * b;
			document.newdiesel.totalamount.value = c;
		}
	</script>
</head>
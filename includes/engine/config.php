<?php

/* config for Thicket properties 

define() sets constants permanently, so they can't be changed on the fly. 

a friendly GUI to delete/update these fields is coming soon...
	
*/

define("name","Cool Thicket Site");
define("url","http://my.thicket.site.com/");
define("staticPath","/includes");
define("cdn",false);
define("tagline","This is the coolest site ever.");
define("taglineVisible",true);
define("description","I used Thicket to build this site, and it made me very powerful.");
define("database","");
define("databasePort","localhost"); // localhost by default
define("databaseUser","");
define("databasePassword","");
define("defaultView","list");
define("defaultColorScheme",true);
define("accentColor","");
define("accentContrastColor","");
define("secondaryColor","");
define("secondaryContrastColor","");
define("defaultEmail","johnny@example.com");
define("mailURL","http://example.com");
define("emailFooter","mail address required by law...");
define("twitter",""); // remove the @, just "twitter"
define("embedly","");
define("htmlInjectAtBeginning",""); // placed after opening <body> tag
define("htmlInjectAtEnd",""); // placed before closing </body> tag
define("jsInject",""); // script resource placed before closing </body> tag
define("cssInject",""); // stylesheet defined before closing </head> tag
define("fontURL","http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400");
define("fontFamilyDefinition","'Roboto', 'Helvetica Neue', arial, sans-serif");
define("logoVisible",true);
define("logo",url."/includes/img/logo.png");
define("logo2x","");
define("favicon","");
define("favicon2x","");
define("commentingEnabled",true);
define("pageLoader",true);
define("postingEnabled",true);
define("cookiesEnabled",true);
define("responsiveEnabled",true);
define("robots",false);
define("googleAnalytics",false);
define("gaTrackingID","XA-XXXXXXX");
define("errorMessage","Sorry, but the page you are looking could not be found. Why don't you go back home?");
define("titleSeparator","/");



?>
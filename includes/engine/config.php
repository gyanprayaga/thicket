<?php

/* config for specific Thicket properties */

define("name","My Thicket Site");
define("url","http://yoursite.com");
define("thicketToken","OtydHVLTLXq3FMCLFbEf"); // DO NOT CHANGE THIS
define("staticPath","/includes");
define("cdn",false);
define("tagline","Welcome to <b class='regular'>My Thicket Site</b>, a site built with Thicket"); // html allowed
define("taglineVisible",false);
define("description","Build your app quickly with Thicket, an ultra-simple PHP MVC.");
define("database","thicketdb");
define("databasePort","localhost");
define("databaseUser","thicket_user");
define("databasePassword","supersecurepassword");
define("defaultView","list");
define("accentColor","orange");
define("accentContrastColor","white");
define("secondaryColor","");
define("secondaryContrastColor","");
define("selectionBackgroundColor","whitesmoke"); // replaces the standard browser text selection color
define("selectionTextColor","black");
define("adminEmail","email@example.com"); // email with administrative privilege on the site, will double-check with database
define("defaultEmail","email@example.com");
define("mailURL",url);
define("emailFooter","mail address required by law...");
define("twitter","mytwitter"); // no @
define("embedly","");
define("htmlInjectAtBeginning",""); // placed after opening <body> tag
define("htmlInjectAtEnd",""); // placed before closing </body> tag
define("jsInject",""); // script resource placed before closing </body> tag
define("customStyles",""); // instead of changing the defaults, we recommend that you layer on top of Thicket with your own CSS -- just enter the stylesheet URL or relative path here
define("fontUrl","http://fonts.googleapis.com/css?family=Oxygen:400,300,700"); // like this one, from Google Fonts, myFonts, etc.
define("fontFamilyDefinition","'Helvetica Neue', arial, sans-serif");
define("defaultFontWeight","400");
define("defaultTextColor","blue");
define("cssOverride",""); // inline CSS-string applied to *, which will override styles of all elements (not great for performance, so not recommend) -- don't forget to put a semicolon at the end of each line
define("fontScale","1.1em"); // increase or decrease overall font size
define("siteBackground","whitesmoke"); // use background CSS shorthand
define("siteNestedBackground","white"); // for content inside of main site (use background CSS shorthand)
define("sitePostNestedBackground","whitesmoke"); // for content inside of main site (use background CSS shorthand) on POST pages
define("siteTheme","light"); // choose between light or dark
define("logoVisible",true);
define("logo",url.staticPath."/img/thicket-logo.png");
define("logoHeight","25px");
define("logoFrameWidth","100px"); // defines the size of the logo frame, doesn't actually alter the image
define("logoMarginTop","20px"); // margin top for logo
define("logoMarginBottom","20px"); // margin bottom for logo
define("navHorizontalPosition","25px"); // space on the left and right for navigation
define("navHorizontalSpacing","25px"); // spacing between navigation links
define("navHorizontalSpacingNoPx","25");
define("navDropdownHorizontalSpacing","5px"); // spacing on the right and left for special dropdown navs
define("navDropdownHorizontalSpacingNoPx","5"); 
define("navDropdownHorizontalPosition","94px"); // abs. position for dropdown (top)
define("navDropdownVerticalPosition","66px"); // abs. position for dropdown (left)
define("logoVerticalPosition","-".(17 + logoHeight)."px"); // margin bottom for logo
define("logoVerticalPositionNoPx",(17 + logoHeight)); // margin bottom for logo without px
define("logo2x","");
define("favicon","");
define("favicon2x","");
define("commentingEnabled",true);
define("pageLoader",false);
define("postingEnabled",true);
define("cookiesEnabled",true);
define("upvotesEnabled",true);
define("chatEnabled",false); // keep it off, it's not yet ready :(
define("chatArchitecture",false); // ditto, options are: default OR sockets
define("responsiveEnabled",true);
define("robots",false);
define("googleAnalytics",false);
define("googleSignIn","XXXXXX_X_X_X_X_X_X_X.website.com"); // in order to enable Google+ login on your website
define("gaTrackingID","XA-XXXXXXX");
define("errorMessage","Sorry, but the content you are looking could not be found. Why don't you go back <a href='".url."'>home</a>?");
define("titleSeparator","/");



?>
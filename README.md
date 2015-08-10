# thicket
###Build your app quickly with Thicket, an ultra-simple PHP MVC 

Thicket is easy to setup and get going. Just find the config.php file in /includes/engine/ and edit the default parameters to fit your own website. 

Editing pages is easy. Thicket comes pre-loaded with a Home (_home.php), About (_about.php), Create (_create.php), and Login/Register (_login.php) page. Just find the one you want and edit the HTML to fit your needs. We've also got a barebones stylesheet and some minimal JS functionality (spaghetti JS to get you moving faster, although we recommend refactoring once you push to production), but you can edit that too at /includes/css/style.css and /includes/js/script.js respectively.

Thicket includes an excellent forum structure, robust login/register form, Disqus comment integration, newsletter sendouts (coming soon!), spam prevention, messaging (still needs work!), and other great features. It's an un-framework, without the clutter or weight of other PHP libraries. You don't have to learn anything - just install it on your web app's home directory and get started!

###Before you start!
Create a .htaccess file (in the main directory of your Thicket installation) and then delete this file (or keep it if you want, it’s up to you ;)

Put this code inside your .htaccess file:

<IfModule mod_rewrite.c>
RewriteCond %{THE_REQUEST} ^[A-Z]{3,9}\ /.*index\.php
RewriteRule ^index.php/?(.*)$ $1 [R=301,L]

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php/$1?%{QUERY_STRING} [L]
</IfModule>
<IfModule mod_headers.c>
<FilesMatch ".(js|css|xml|gz|html)$">
Header append Vary: Accept-Encoding
</FilesMatch>
</IfModule>

Also, remember to configure your MySQL database information in /includes/engine/config.php so that Thicket can connect to a data source.

###Configure your database!
Open http://yoursite.com/includes/engine/modules/db_build.php in your browser after you configure your database information in the previous step. This will automatically build all the tables in your database and create a sample post using SQL queries.
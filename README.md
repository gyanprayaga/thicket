# thicket
###Build your app quickly with Thicket, an ultra-simple PHP MVC 

Thicket is easy to setup and get going. Just find the config.php file in /includes/engine/ and edit the default parameters to fit your own website. 

Editing pages is easy. Thicket comes pre-loaded with a Home (_home.php), About (_about.php), Create (_create.php), and Login/Register (_login.php) page. Just find the one you want and edit the HTML to fit your needs. We've also got a barebones stylesheet and some minimal JS functionality (spaghetti JS to get you moving faster, although we recommend refactoring once you push to production), but you can edit that too at /includes/css/style.css and /includes/js/script.js respectively.

Thicket includes an excellent forum structure, robust login/register form, Disqus comment integration, newsletter sendouts (coming soon!), spam prevention, messaging (still needs work!), and other great features. It's an un-framework, without the clutter or weight of other PHP libraries. You don't have to learn anything - just install it on your web app's home directory and get started!

###Before you start
Create a .htaccess file (in the main directory of your Thicket installation) and then delete this file (or keep it if you want, it’s up to you ;)

Put this code inside your .htaccess file:

```
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
```

Also, remember to configure your MySQL database information in /includes/engine/config.php so that Thicket can connect to a data source.

###Configure your database
Open /includes/engine/modules/db_build.php in your browser after you configure your database information in the previous step. This will automatically build all the tables in your database and create a sample post using SQL queries.

###Ready to go
Now you're all done. Thicket should be running smoothly on your server. If not, create an issue on this repo and we'll try to resolve it ASAP.

I told you Thicket was simple!

###FAQ

####How do I edit the code?
Just open the folder under /includes/ to access the stylesheets, scripts, and PHP template/controller files that run Thicket. Keep in mind that the stylesheet is a PHP file (disguised as CSS) powered by config.php, so a lot of functionality can be added simply by changing the config file.

####Can I use this for non open-source projects?
Of course! If you want Thicket for Enterprise, visit http://gyan.biz/thicket and click on the "Build with Thicket" button.

####It's not working :(
Hmm... Try looking through the tutorial again. If that doesn't help, check out the detailed overview of Thicket on http://gyan.biz/thicket/ or post a question to the Issues page.

####Can I add an external stylesheet?
Sure thing! Just open config.php and add the URL to your cdn or relative file path in the corresponding definition.

```
define("customStyles","http://cdn.coolsite.com/css/mystylesheet.css"); // instead of changing the defaults, we recommend that you layer on top of Thicket with your own CSS -- just enter the stylesheet URL or relative path here
```

####Why did you use PHP instead of Python or an MVC JavaScript language?
Good question. First, I used PHP because it is accessible and runs a large portion of the web today. More people know PHP that any other back-end scripting language.

There are some great tools like Meteor and other full-stack JavaScript website frameworks. However, I choose to build Thicket with a server-side and front-end piece because it's the most compatible solution, and because it doesn't require significant understanding of new web and programming technologies.

####Why'd you build this?
I wanted a scalable and robust MVC framework built with PHP which I could easily customize. Thicket is used by teachers to facilitate discussion outside of the classroom, companies to create forums and polls, and Slack communities for building an online counterpart to their chats.

If you found a cool way to use Thicket in your project, post an issue so I can see it :)

####This is great! Can I donate?
Of course! Just visit http://cash.me/$gyan to donate money directly to Gyan, the guy who built Thicket.
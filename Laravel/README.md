# LARAVEL
<ul>
  <li><a href="#server-requirements">Server requirements</a></li>
  <li><a href="#installing-composer">Installing Composer</a></li>
  <li><a href="#installing-laravel">Installing Laravel</a></li>
</ul>

#Server Requirements
The Laravel framework has a few system requirements. Of course, all of these requirements are satisfied by the Laravel Homestead 
virtual machine, so it's highly recommended that you use Homestead as your local Laravel development environment.<br/>
However, if you are not using Homestead, you will need to make sure your server meets the following requirements:
  >> PHP >= 5.5.9 <br/>
  >> OpenSSL PHP Extension<br/>
  >> PDO PHP Extension<br/>
  >> Mbstring PHP Extension<br/>
  >> Tokenizer PHP Extension<br/>

#Installing Composer
Laravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.
  >> https://getcomposer.org/download/

#Installing Laravel
Via Laravel Installer<br/>
First, download the Laravel installer using Composer:<br/>
  >> composer global require "laravel/installer"<br/>
  >> Make sure to place the ~/.composer/vendor/bin directory (or the equivalent directory for your OS) in your PATH so the laravel executable can be located by your system.

Once installed, the laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel's dependencies already installed. This method of installation is much faster than installing via Composer:<br/>
  >> laravel new name-aplication<br/>
Now if you want change the new application to another one place where you want and start your new project with:<br/>
  >> php artisan server<br/>
  >> Make sure to place the where you fixed your new applicatin.

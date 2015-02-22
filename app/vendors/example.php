<!--
This file is an example vendor file

It is to be placed in root/app/vendors, not to be mistaken with root/vendors 
which affects the whole cake framework [details needed - search more info in web ...]

Its logic is autonomous and it does not inherit variables from the app. 
So in order to create an included element with cakePHP app logic or variables, 
use cake Elements, Components or Plugins ionstead

The way to invoke the code below into a file (model, controller or view file 
[to be confirmed, only tried with view file]), use the following syntax :

App::import('Vendor','filename');

		Or
		
App::import('vendor', 'uniqueidentifier', array('file'=>'path/relative/to/vendor/File_Name.php); 

for details, see :

http://cakebaker.42dh.com/2008/03/26/loading-vendor-files/

http://www.sanisoft.com/blog/2008/05/10/help-vendor-is-deprecated/



-->
<div class="styleclass">
	<?php 
		$hulaHoop = 'Aloha from app/vendor/example.php !';
		echo '<br/>'.$hulaHoop.'<br/>' 
	?>
</div>
<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your folder: <?php echo $_POST["folder"]; ?>
<br>
Your branch: <?php echo $_POST['branchlist']; ?>

<h3>Executing Newhost.sh TBI</h3>
<?php
$myfile = fopen("write.txt", "a+") or die("Unable to open file!");

//echo fread($myfile,filesize("C:/xampp/apache/conf/extra/httpd-vhosts.conf"));

/*$txt = '<VirtualHost *:80>
     ServerName '. $_POST['name'] . '.localhost
     DocumentRoot c:/'.$_POST['folder'].'
     SetEnv APPLICATION_ENV "development"
     <Directory C:/'.$_POST['folder'].'>
         DirectoryIndex index.php
         AllowOverride All
         Order allow,deny
         Allow from all
     </Directory>
 </VirtualHost>

 ';*/

//fwrite($myfile, $txt);

//mkdir('c:/Programming/'.$_POST['folder'], 0700);

//fclose($myfile);

//$myfile = fopen("C:/Windows/System32/drivers/etc/hosts.txt", "a+") or die("Unable to open file!");
//$txt = '127.0.0.1 '.$_POST['name'].'.localhost';
//fclose($myfile);

//exec('Newhost.sh');
?>


</body>
</html>
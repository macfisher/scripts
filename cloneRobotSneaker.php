<?php

//clone robot-sneaker repo
$cloneCmd = sprintf("sudo -u root git clone https://github.com/macfisher/robot-sneaker-crud");

//set permissions
$wwwDataCmd = sprintf("sudo -u root chown -R :www-data /var/www/robot-sneaker-crud");
$storageCmd = sprintf("sudo -u root chmod -R 775 /var/www/robot-sneaker-crud/app/storage");

$cloneExe = shell_exec($cloneCmd);
$wwwDataExe = shell_exec($wwwDataCmd);
$storageExe = shell_exec($storageCmd);

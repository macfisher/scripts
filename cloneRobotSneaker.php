<?php

//clone robot-sneaker repo
$cloneCmd = sprintf("sudo -u root git clone https://github.com/macfisher/robot-sneaker");
$cloneExe = shell_exec($cloneCmd);

//set permissions
$wwwDataCmd = sprintf("sudo -u root chown -R :www-data /var/www/robot-sneaker");
$wwwDataExe = shell_exec($wwwDataCmd);

$storageCmd = sprintf("sudo -u root chmod -R 775 /var/www/robot-sneaker/app/storage");
$storageExe = shell_exec($storageCmd);

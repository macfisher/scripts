<?php

function cloneRepo($repo) {
	
	$dir = "/var/www/$repo";
	$rmDirCmd = sprintf("sudo -u root rm -r %s", $dir);
	shell_exec($rmDirCmd);
	
	$url = "https://github.com/macfisher/";
	$cloneCmd = sprintf("sudo -u root git clone %s%s", $url, $repo);
	shell_exec($cloneCmd);
	
	$wwwPrivCmd = sprintf("sudo -u root chown -R :www-data %s", $dir);
	shell_exec($wwwPrivCmd);
	
	$storagePrivCmd  = sprintf("sudo -u root chmod -R 775 %s/app/storage", $dir);
	shell_exec($storagePrivCmd);
	
}

cloneRepo("comment-template");
	





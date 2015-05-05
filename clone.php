<?php

function cloneRepo($repo, $isLaravel) {
	
	$dir = "/var/www/$repo";
	$rmDirCmd = sprintf("sudo -u root rm -r %s", $dir);
	shell_exec($rmDirCmd);
	
	$url = "https://github.com/macfisher/";
	$cloneCmd = sprintf("sudo -u root git clone %s%s", $url, $repo);
	shell_exec($cloneCmd);
	
	//set permissions if the app is Laravel
	if ($isLaravel) {
		$wwwPrivCmd = sprintf("sudo -u root chown -R :www-data %s", $dir);
		shell_exec($wwwPrivCmd);
		fwrite(STDOUT, "\nwww-data permissions set.");
		
		$storagePrivCmd  = sprintf("sudo -u root chmod -R 775 %s/app/storage", $dir);
		shell_exec($storagePrivCmd);
		fwrite(STDOUT, "\n.../app/storage permissions set.\n");
	}
}


fwrite(STDOUT, "\nEnter Code Repo: ");
$getRepo = trim(fgets(STDIN));
fwrite(STDOUT, $getRepo);

fwrite(STDOUT, "\nIs this a Laravel app? (Y/N): ");
$getLaravelResp = trim(fgets(STDIN));

if ($getLaravelResp == "Y" || $getLaravelResp == "y") {
	
	$isLaravel = true;
	cloneRepo($getRepo, $isLaravel);
	
} elseif ($getLaravelResp == "N" || $getLaravelResp == "n") {
	
	$isLaravel = false;
	cloneRepo($getRepo, $isLaravel);
	
} else {
	
	fwrite(STDOUT, "\nERROR: That is an invalid response.\n");
	exit;
}

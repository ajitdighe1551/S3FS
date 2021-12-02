#!/usr/bin/php
<?php

$AWS_ACCESS_KEY_ID = 'AKIA5GT67LSRJTHLTH3C';
$AWS_SECRET_KEY    = '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';
if (empty($AWS_ACCESS_KEY_ID) || empty($AWS_SECRET_KEY )) {
	echo "Access keys are not in the environment";
	exit(1);
}

$credentials_file = '/etc/passwd-s3fs';

$new_credentials = $AWS_ACCESS_KEY_ID.':'.$AWS_SECRET_KEY;

if (!file_exists($credentials_file) || (file_get_contents($credentials_file) != $new_credentials)) {

	file_put_contents($credentials_file, $new_credentials);
	chmod($credentials_file, 0640);
	chown($credentials_file, 'webapp');
}

?>
<?php
require 'vendor/autoload.php';
require 'config.php';

use Abraham\TwitterOAuth\TwitterOAuth;

// TwitterOAuthクラスのインスタンスを作成
$connect = new TwitterOAuth(CK, CSec, AT, ASec);

$account = $connect->get(
	'account/settings'
);

var_dump($account);
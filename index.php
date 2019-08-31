<?php
session_start();

require 'vendor/autoload.php';
require 'config.php';

use Abraham\TwitterOAuth\TwitterOAuth;

// TwitterOAuthクラスのインスタンスを作成
$connect = new TwitterOAuth(CK, CSec, $_SESSION['access_token']['oauth_token'], $_SESSION['access_token']['oauth_token_secret']);

$account = $connect->get(
	'account/settings'
);

var_dump($account);
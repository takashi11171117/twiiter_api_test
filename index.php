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

try {
    $media1 = $connect->upload('media/upload', ['media' => 'download.jpg']);
    $result = $connect->post(
        'statuses/update',
        [
            "status" => "twitter apiの画像投稿testだよ",
            'media_ids' => implode(
                ',',
                [
                    $media1->media_id_string,
                ]
            )
        ]
    );
} catch(Exception $e) {
    var_dump($e);
}

if($connect->getLastHttpCode() == 200) {
    // ツイート成功
    print "tweeted\n";
} else {
    // ツイート失敗
    print "tweet failed\n";
}

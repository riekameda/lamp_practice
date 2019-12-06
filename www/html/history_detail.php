<?php
require_once '../conf/const.php';
require_once '../model/functions.php';
require_once '../model/user.php';
require_once '../model/history.php';
require_once '../model/history_detail.php';

session_start();

if(is_logined() === false){
    redirect_to(LOGIN_URL);
}
$history_id = get_get('history_id');
$db = get_db_connect();
$user = get_login_user($db);
// dd($history_id);
$history_details = get_history_details($db, $history_id);
$history = get_history($db, $history_id);
if(is_admin($user) === false && $history['user_id'] !== $user['user_id']){
    redirect_to(HISTORY_URL);
}

include_once '../view/history_detail_view.php';
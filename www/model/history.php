<?php
function insert_user_history($db, $user_id){
    $sql = 'INSERT INTO histories (user_id) VALUES(:user_id)';
    $params = array(':user_id' => $user_id);
    
    return execute_query($db, $sql, $params);
}

function get_histories ($db, $user_id){
    $sql = 'SELECT 
        histories.history_id, 
        histories.created,
        SUM(history_details.purchased_price * history_details.amount) AS total
        FROM 
            histories
        JOIN 
            history_details
        ON 
            histories.history_id = history_details.history_id
        WHERE
            histories.user_id = :user_id
        GROUP BY 
            histories.history_id
        ';
    $params = array(
        ':user_id'=> $user_id
    );
    return fetch_all_query($db, $sql, $params);
        
}

function get_history ($db, $history_id){
    $sql = "SELECT
        histories.history_id,
        histories.user_id,
        histories.created,
        SUM(history_details.purchased_price * history_details.amount) AS total
        FROM
            histories
        JOIN
            history_details
        ON
            histories.history_id = history_details.history_id
        WHERE
            histories.history_id = {$history_id}
        ";
    $params = array(
        // ':history_id'=> 1
    );

    return fetch_query($db, $sql, $params);
}
<?php
function insert_history_detail ($db, $item_id, $history_id, $purchased_price, $amount) {
    $sql = 'INSERT INTO history_details (
        item_id, 
        history_id, 
        purchased_price,
        amount
    )VALUES(
        :item_id,
        :history_id, 
        :purchased_price,
        :amount
    )';

    $params = array(
        ':item_id' => $item_id,
        ':history_id' => $history_id,
        ':purchased_price'  => $purchased_price,
        ':amount'  => $amount
    );


    return execute_query($db, $sql, $params);
}

// DBからデータを取り出す「商品名」「購入時の商品価格」 「購入数」「小計」
function get_history_details ($db, $history_id){
    $sql = 'SELECT 
        items.name, 
        history_details.purchased_price, 
        history_details.amount
        
        FROM 
            history_details
        JOIN 
            items
        ON 
            history_details.item_id  = items.item_id 
        WHERE
            history_details.history_id = :history_id 
        
        ';
    $params = array(
        ':history_id'=> $history_id 
    );
    return fetch_all_query($db, $sql, $params);
        
}
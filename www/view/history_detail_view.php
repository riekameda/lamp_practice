<!doctype html>
<html>
<head>
<?php include VIEW_PATH . 'templates/head.php'; ?>
<meta charset="utf-8">
<title>購入明細画面</title>
<link rel="stylesheet" href="<?php print(h(STYLESHEET_PATH . 'admin.css')); ?>">
</head>

<body>
<?php 
  include VIEW_PATH . 'templates/header_logined.php'; 
?>
  <section>
    <p>注文番号: <?php print(h($history['history_id'])); ?></p>
    <p>購入日時: <?php print(h($history['created'])); ?></p>
    <p>合計金額: <?php print(h($history['total'])); ?></p>
    <table>
      <caption>購入明細</caption>
      <tr>
        <th>商品名</th>
        <th>購入時の商品価格</th>
        <th>購入数</th>
        <th>小計</th>
      </tr>
      
      <?php foreach($history_details as $history_detail){ ?>
        <tr>
          <td><?php print(h($history_detail['name'])); ?></td>
          <td><?php print(h($history_detail['purchased_price'])); ?></td>
          <td><?php print(h($history_detail['amount'])); ?></td>
          <td><?php print(h($history_detail['purchased_price'] * $history_detail['amount'])); ?></td>
        </tr>
      <?php } ?>
    </table>
    

  </section>
</body>
</html>
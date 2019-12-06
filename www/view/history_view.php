<!doctype html>
<html>
<head>
<?php include VIEW_PATH . 'templates/head.php'; ?>
<meta charset="utf-8">
<title>購入履歴画面</title>
<link rel="stylesheet" href="<?php print(h(STYLESHEET_PATH . 'admin.css')); ?>">
</head>

<body>
<?php 
  include VIEW_PATH . 'templates/header_logined.php'; 
?>
  <section>
    
    <table>
      <caption>購入履歴</caption>
      <tr>
        <th>注文番号</th>
        <th>購入日時</th>
        <th>合計金額</th>
        <th></th>
      </tr>
      
      <?php foreach($histories as $history){ ?>
        <tr>
          <td><?php print(h($history['history_id'])); ?></td>
          <td><?php print(h($history['created'])); ?></td>
          <td><?php print(h($history['total'])); ?></td>
          <td><a href="history_detail.php?history_id=<?php print(h($history['history_id'])); ?>"><button>明細表示</button></a></td>
        </tr>
      <?php } ?>
    </table>
    

  </section>
</body>
</html>
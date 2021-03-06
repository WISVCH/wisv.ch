<?php

include(dirname(__FILE__)."/config.php");
include(dirname(__FILE__)."/mysqlidb.php");

$db = new MysqliDb(SERVER, USERNAME, PASSWORD, DATABASE);
$db->orderBy('`key`','asc');
$redirects = $db->get(TABLE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Showing redirects</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="assets/style.css" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class="container">
    <div id="header" class="page-header">
      <h1>wisv.ch</h1>
    </div>
    <div class="row">
      <div id="alert-placeholder"></div>
    </div>
    <div class="row">
      <button id="addItem" class="btn btn-primary col-md-4 col-md-offset-4">Add item</button>
    </div>
    <div class="row">
      <table id="redirects" class="table table-hover">
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th>Key</th>
            <th>Redirect URL</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($redirects as $r) { ?><tr class="item-row" id="row-<?php echo $r['id']; ?>">
            <td><span class="glyphicon glyphicon-pencil edit-button" aria-hidden="true"></span></td>
            <td><span class="glyphicon glyphicon-trash remove-button" aria-hidden="true"></span></td>
            <td class="key"><a href="/<?php echo $r['key']; ?>" target="_blank"><?php echo $r['key']; ?></a></td>
            <td class="redirect"><a href="<?php echo $r['redirect']; ?>" target="_blank"><?php echo $r['redirect']; ?></a></td>
          </tr>
        <?php } ?></tbody>
      </table>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/bootbox.min.js"></script>
  <script type="text/javascript" src="assets/wisvch.js"></script>
</body>
</html>

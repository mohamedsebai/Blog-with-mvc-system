<?php
ob_start();
include IINT_VIEWS;
$format->page_title = 'page not found';
include $tpl . 'header.php';
?>
<body>
<?php include $tpl . 'navbar.php'; ?>

<div class="page404" style="text-align: center; min-height: 600px">
 <h2 style="position: absolute; top: 25%; left: 42%;">Page not found 404</h2>
</div>


<?php include $tpl . 'footer_content.php'; ?>
<?php include $tpl . 'footer.php'; ob_end_flush(); ?>

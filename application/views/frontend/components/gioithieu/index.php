<?php ob_start(); ?>
<h1>Trang giới thiệu</h1>
<?php 
	$content = ob_get_clean();
	include('./application/views/frontend/layout.php');
?>
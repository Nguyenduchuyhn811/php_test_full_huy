<?php
	if ($distric == 0 || $distric == '') {
?>
		<option value="0">-- Chưa chọn quận --</option>
<?php
	}else{
?>	
	<option value="0">-- Chọn xã phường --</option>
	<?php 
		// include_once('function.php');
		// $sqlphuong    = 'SELECT * FROM devvn_xaphuongthitran WHERE maqh = ' . $_POST['data_distric'];
		// $phuong = mysql($sqlphuong);
		foreach ($commune as $m => $n) {
	?>
		<option value="<?php echo $n['xaid'] ?>"><?php echo $n['name'] ?></option>
	<?php
		}
	}
	?>
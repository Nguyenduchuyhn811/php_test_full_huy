<?php
	if ($city== 0 || $city == '') {
?>
		<option value="0">-- Chưa chọn thành phố --</option>
<?php
	}else{
?>	
	<option value="0">-- Chọn quận huyện --</option>
	<?php 
		foreach ($distric as $m => $n) {
	?>
		<option value="<?php echo $n['maqh'] ?>"><?php echo $n['name'] ?></option>
	<?php
		}
	}
	?>
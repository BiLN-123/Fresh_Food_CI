<?php if(($this->session->userdata('message'))):?>
	<div class="nNote nInformation hideit">
		<p><strong>Thông báo: </strong><?php echo $this->session->userdata('message')?></p>
	</div>
<?php endif;?>

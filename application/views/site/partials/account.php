<?php if($this->session->userdata('user_id_login')):?>
	<a href="<?=  base_url('user');?>"><i class="fa fa-user"></i> <?= $this->session->userdata('user_name_login') ?></a>
<?php else: ?>
	<a href="<?=  base_url('login');?>"><i class="fa fa-user"></i> Đăng nhập</a>
<?php endif; ?>

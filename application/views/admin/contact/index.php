<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Phản hôi từ khách hàng</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= admin_url('home') ?>">Trang quản trị</a></li>
						<li class="breadcrumb-item active">Phản hồi</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- /.col-md-6 -->
				<?php $this->load->view('admin/message', $this->data); ?>
				<div class="col-md-12">
					<table id="example" class="table table-bordered" style="width:100%">
						<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col" >Tên</th>
							<th scope="col">Email</th>
							<th scope="col" style="width: 45%">Phản hồi</th>
						</tr>
						</thead>
						<tbody>

						<?php foreach ($listContacts as $contact): ?>
							<tr>
								<th scope="row"><?= $contact->id ?></th>
								<td><?= $contact->name ?></td>
								<td><?= $contact->email ?></td>
								<td><textarea cols="50" rows="5" disabled><?= $contact->message ?></textarea></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>


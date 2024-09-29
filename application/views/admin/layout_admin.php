<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<?php $this->load->view('admin/partials/head'); ?>
</head>
<body class="hold-transition sidebar-mini pace-success">
<div class="wrapper">
	<!-- Header -->
	<?php $this->load->view('admin/partials/header'); ?>

	<!-- Main Sidebar Container -->
	<?php $this->load->view('admin/partials/siderbar'); ?>

	<!-- Content -->
	<?php $this->load->view($temp, $this->data); ?>
	<!-- End content -->


	<!-- Main Footer -->
	<?php $this->load->view('admin/partials/footer'); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="plugins/pace-progress/pace.min.js"></script>


<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>

<script>
	$(document).ready(function () {

		// Cấu hình các nhãn phân trang
		$('#example').dataTable({
			aaSorting: [[0, 'desc']],
			"language": {
				"sProcessing": "Đang xử lý...",
				"sLengthMenu": "Xem _MENU_ mục",
				"sZeroRecords": "Không tìm thấy dòng nào phù hợp",
				"sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
				"sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
				"sInfoFiltered": "(được lọc từ _MAX_ mục)",
				"sInfoPostFix": "",
				"sSearch": "Tìm:",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Đầu",
					"sPrevious": "Trước",
					"sNext": "Tiếp",
					"sLast": "Cuối"
				}
			}
		});

	});
</script>
</body>
</html>

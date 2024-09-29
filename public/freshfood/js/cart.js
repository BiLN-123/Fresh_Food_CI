$(function () {
	$(document).on('click', '.add_to_cart', function (e) {
		e.preventDefault();
		let urlRequest = $(this).data('url');
		$.ajax({
			type: 'GET',
			url: urlRequest,
			success: function (data) {
				var data2 = JSON.parse(data);
				if (data2.success == true) {
					var count_cart = $('#count_cart')
					var count = count_cart.text();
					var x = parseInt(count);
					var y = x + 1;
					var element = document.getElementById('count_cart');
					element.innerHTML = y;
					Swal.fire({
						title: 'Thêm vào giỏ hàng thành công',
						icon: 'success',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: 'Tiếp tục mua hàng',
						confirmButtonText: 'Đi đến giỏ hàng',
					}).then((result) => {
						if (result.isConfirmed) {
							window.location.href = "/freshfood/cart";
						}
					})
				} else {
					Swal.fire({
						icon: 'error',
						title: data2.message,
					})
				}
			},
			error: function () {

			}
		});

	});
	$(document).on('click','.cart_delete', function (e){
		e.preventDefault();
		let urlRequest = $(this).data('url');
		let that = $(this);
		Swal.fire({
			title: 'Bạn có muốn xoá sản phẩm này khỏi giỏ hàng?',
			// text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Đồng ý'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: 'GET',
					url: urlRequest,
					success: function (data){
						var data2 = JSON.parse(data);
						if(data2.success == true){
							var count_cart = $('#count_cart')
							var count = count_cart.text();
							var x = parseInt(count);
							var y = x - 1;
							var element = document.getElementById('count_cart');
							element.innerHTML = y;
							that.parent().parent().remove();
							Swal.fire({
								position: 'top-end',
								icon: 'success',
								title: 'Xoá thành công',
								showConfirmButton: false,
								timer: 1500
							})
						}
						else {
							Swal.fire({
								position: 'top-end',
								icon: 'error',
								title: 'Xoá thất bại',
								showConfirmButton: false,
								timer: 1500
							})
						}
					},
					error: function (){

					}
				});

			}
		})
	});

});

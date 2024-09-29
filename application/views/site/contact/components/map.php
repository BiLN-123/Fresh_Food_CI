<div class="map">
<!--	<iframe-->
<!--		src="--><?//= $map ?><!--"-->
<!--		height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
	<?= $map ?>
	<div class="map-inside">
		<i class="icon_pin"></i>
		<div class="inside-widget">
			<h4><?= $name ?></h4>
			<ul>
				<li>Điện thoại: <?= $phone ?></li>
				<li>Địa chỉ: <?= $address ?></li>
			</ul>
		</div>
	</div>
</div>

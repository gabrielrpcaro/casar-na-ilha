<?php if (!is_page(66)) { 
	$bannerspost = get_field('banners_post', 286);
	if ($bannerspost) { ?>
		<div class="ladodireito">
	<?php	foreach ($bannerspost as $banner) { ?>
			<div class="post banner-post banner-post-single">
				<a href="<?php echo $banner['link_banner']; ?>">
					<div class="posteeHACK">
						<div class="postee" style="background-image:url('<?php echo $banner['banner']; ?>');"></div>
					</div>
				</a>
			</div>
	<?php	} ?>
		</div>
	<?php } } ?>
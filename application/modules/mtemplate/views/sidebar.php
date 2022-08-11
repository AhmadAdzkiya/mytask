<div class="be-left-sidebar">
	<div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Blank Page</a>
		<div class="left-sidebar-spacer">
			<div class="left-sidebar-scroll">
				<div class="left-sidebar-content">
					<ul class="sidebar-elements">
						<li class="divider">Menu</li>
						<?php
						$priviliges = group_priviliges();
						// var_dump($priviliges);

						foreach ($priviliges as $head_pre) :

							if (empty($head_pre->sub)) :
						?>
								<li class="<?= (uri_string() == $head_pre->url ? 'active' : '') ?>">
									<a href="<?= base_url() ?><?= $head_pre->url ?>">
										<?= $head_pre->icon ?>
										<span><?= $head_pre->perm_name ?></span></a>
								</li>
							<?php
							endif;
							if (!empty($head_pre->sub)) :
							?>
								<li class="parent"><a href="#"><?= $head_pre->icon ?> <span><?= $head_pre->perm_name ?></span></a>
									<ul class="sub-menu">
										<?php foreach ($head_pre->sub as $sub) : ?>
											<li class="<?= (uri_string() == $sub->url ? 'active' : '') ?>">
												<a href="<?= base_url() ?><?= $sub->url ?>">
													<i class="fa fa-angle-right" aria-hidden="true"></i> <?= $sub->perm_name ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</li>
						<?php
							endif;
						endforeach;
						?>

					</ul>
				</div>
			</div>
		</div>

	</div>
</div>

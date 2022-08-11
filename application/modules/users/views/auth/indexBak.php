<div class="be-content">
	<div class="main-content container-fluid">
		<div class="row">
			<div class="col-12 col-lg-6 col-xl-3">
				<div class="widget widget-tile">
					<div class="chart sparkline display-4" id="spark1">
						<span class="icon mdi mdi-accounts-alt"></span>
					</div>
					<div class="data-info">
						<div class="desc"> Users</div>
						<div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="113">
								<?php
								echo $total_users;
								?>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6 col-xl-3">
				<div class="widget widget-tile">
					<div class="chart sparkline display-4" id="spark2">
						<span class="icon mdi mdi-accounts-alt"></span>
					</div>
					<div class="data-info">
						<div class="desc">Today Users</div>
						<div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number" data-toggle="counter" data-end="80" data-suffix="%"><?= $today_users ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6 col-xl-3">
				<div class="widget widget-tile">
					<div class="chart sparkline display-4" id="spark3">
						<span class="icon mdi mdi-face"></span>
					</div>
					<div class="data-info">
						<!-- This is script is for count page visitor  -->
						<?php

						$counter_name = "";

						// Open the file for reading
						$fp = fopen("counter.txt", "r");

						// Get the existing count
						$count = fread($fp, 1024);

						// Close the file
						fclose($fp);

						// Add 1 to the existing count
						$count = $count + 1;

						// Display the number of hits
						// If you don't want to display it, comment out this line
						$counterVal =  $count;

						// Reopen the file and erase the contents
						$fp = fopen("counter.txt", "w");

						fwrite($fp, $count);

						// Close the file
						fclose($fp);
						?>
						<div class="desc">Visitors</div>
						<div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number" data-toggle="counter" data-end="532">
								<?php
								echo $counterVal ;
								?>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6 col-xl-3">
				<div class="widget widget-tile">
					<div class="chart sparkline display-4" id="spark4">
						<span class="icon mdi mdi-accounts-add"></span>
					</div>
					<div class="data-info">
						<div class="desc">New Users</div>
						<div class="value"><span class="indicator indicator-negative mdi mdi-chevron-down"></span><span class="number" data-toggle="counter" data-end="113">
								<?php
								echo $weekly;
								?>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div>
	</div>
</div>

<?php
/**
 * Front page hero section content
 */


?>

<div class="container">

	<div class="hero">
		<div class="row justify-content-around text-center">

			<div class="tagline-container col-lg-8">

				<h1 class="tagline-heading bold-title">
					<?php
					$blog_description = get_bloginfo( 'description' );
					echo shd_title_with_highlight( 'Ingenuity', $blog_description );
					?>
				</h1>

				<?php
				if ( have_rows( 'hero_section' ) ) {

					while ( have_rows( 'hero_section' ) ) {
						the_row();
						?>
						<div class="tagline">
							<div class="bold-description">
								<?php echo get_sub_field( 'tagline' ); ?>
							</div>
							<p><a class="shd-button" href="<?php echo get_sub_field( 'button_url' ); ?>"><?php echo get_sub_field( 'button_text' ); ?></a></p>
						</div>
						<?php
					}

					reset_rows();
				}
				?>

			</div>

		</div>
	</div>

	<div class="sandhills-goals">
		<div class="row">

			<?php
			if ( have_rows( 'hero_section' ) ) {

				while ( have_rows( 'hero_section' ) ) {
					the_row();

					if ( have_rows( 'goals' ) ) {

						// To reduce code, use this handy-dandy array to loop through the created goals.
						$goal_count = array( 'one', 'two', 'three' );

						while ( have_rows( 'goals' ) ) {
							the_row();

							// Each goal uses the same naming scheme, so loop through based on $goal_count
							foreach ( $goal_count as $goal ) {

								if ( have_rows( 'goal_' . $goal ) ) {

									while ( have_rows( 'goal_' . $goal ) ) {
										the_row();
										?>
										<div class="col-lg-4">
											<div class="sandhills-goal">
												<img alt="" class="goal-icon" src="<?php echo get_sub_field( 'icon' ); ?>">
												<h3 class="goal-title title-border"><?php echo get_sub_field( 'title' ); ?></h3>
												<div class="goal-description">
													<?php echo get_sub_field( 'description' ); ?>
												</div>
											</div>
										</div>
										<?php
									}
								}
							}
						}
					}
				}
			}
			?>

		</div>
	</div>

</div>
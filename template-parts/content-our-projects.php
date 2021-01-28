<?php
/**
 * Grid of our projects
 */

$projects = shd_get_projects();

/**
 * Used on the front page to display projects with short descriptions
 */
if ( is_front_page() ) {

	foreach ( $projects as $project ) {
		$project_type    = get_field( 'project_type', $project->ID );
		$project_status  = get_field( 'project_status', $project->ID );
		$project_url     = get_field( 'project_url', $project->ID );
		?>

		<div class="<?php echo $project->post_name . '-col'; ?> project-col col-lg-6">
			<a class="<?php echo $project->post_name . '-url'; ?>" href="<?php echo $project_url; ?>">
				<div class="<?php echo $project->post_name . '-project'; ?> project">
					<div class="row">
						<div class="col-sm-3 <?php echo $project->post_name . '-mascot-col'; ?>">
							<?php echo get_the_post_thumbnail( $project->ID, 'full', array( 'class' => $project->post_name . '-mascot mascot' ) ); ?>
						</div>
						<div class="col-sm-9 <?php echo $project->post_name . '-info-col'; ?>">
							<span class="project-type generic-heading"><?php echo $project_type; ?></span>
							<?php if ( 'Acquired' === $project_status ) { ?>
								<span class="project-status generic-heading">(Project <?php echo $project_status; ?>)</span>
							<?php } ?>
							<span class="project-title generic-heading"><?php echo $project->post_title; ?><span class="external-project-link"><i class="fad fa-external-link"></i></span></span>
							<p class="project-description"><?php echo $project->post_excerpt; ?></p>
						</div>
					</div>
				</div>
			</a>
		</div>

		<?php
	}
}


/**
 * Used on the Projects page to display projects with long descriptions
 */
if ( is_page( 'projects') ) {

	foreach ( $projects as $project ) {
		$project_type    = get_field( 'project_type', $project->ID );
		$project_status  = get_field( 'project_status', $project->ID );
		$project_url     = get_field( 'project_url', $project->ID );
		?>

		<section id="<?php echo $project->post_name; ?>" class="<?php echo $project->post_name . '-section project-section'; ?>">
			<div class="container">
				<div class="<?php echo $project->post_name . '-row'; ?> row content-aside-split">
					<div class="col-lg-8 info-wrap content-split">
						<div class="content-inner">
							<div class="info-row row justify-content-between">
								<div class="col-2 <?php echo $project->post_name . '-mascot-col'; ?>">
									<div class="<?php echo $project->post_name . '-mascot-container'; ?>">
										<?php echo get_the_post_thumbnail( $project->ID, 'full', array( 'class' => $project->post_name . '-mascot mascot' ) ); ?>
									</div>
								</div>
								<div class="col-md-10 <?php echo $project->post_name . '-info-col'; ?>">
									<div class="<?php echo $project->post_name . '-info-container'; ?>">
										<span class="content-subtitle"><?php echo $project_type; ?></span>
										<?php if ( 'Acquired' === $project_status ) { ?>
											<span class="project-status generic-heading">(Project <?php echo $project_status; ?>)</span>
										<?php } ?>
										<a class="content-title" href="<?php echo $project_url; ?>"><?php echo $project->post_title; ?>&nbsp;<i class="fad fa-external-link"></i></a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<?php echo $project->post_content; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 <?php echo $project->post_name . '-actions-col'; ?> aside-split">
						<div class="aside-inner d-flex flex-column">
							<span class="aside-title"><i class="fad fa-info-circle"></i>Quick details</span>
							<p class="aside-description"><?php echo $project->post_excerpt; ?></p>
							<ul class="aside-links">
								<?php
								/**
								 * For whatever reason, standard repeater field looping isn't working here for ACF.
								 * This is an extremely simple work around, grabbing the repeater field data using
								 * get_post_meta. It achieves the same thing.
								 */
								$additional_urls = get_post_meta( $project->ID, 'additional_urls', true );
								$url_counter     = 0;
								while ( $url_counter < $additional_urls ) {
									$additional_url       = get_post_meta( $project->ID, 'additional_urls_' . $url_counter . '_additional_url', true );
									$additional_url_label = get_post_meta( $project->ID, 'additional_urls_' . $url_counter . '_additional_url_label', true );
									?>
									<li><a class="aside-link" href="<?php echo $additional_url; ?>"><?php echo $additional_url_label; ?></a></li>
									<?php
									$url_counter++;
								}
								?>
							</ul>
							<div class="aside-cta mt-auto">
								<?php
								$button_text = 'View project';
								if ( 'Acquired' === $project_status ) {
									$button_text = 'Project acquired';
								}
								?>
								<a class="aside-button shd-button" href="<?php echo $project_url; ?>"><?php echo $button_text; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
}

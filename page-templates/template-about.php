<?php
/**
 * Template Name: About Us
 */

get_header();
?>

	<div class="about-hero">
		<div class="container">
			<div class="hero">
				<header class="row justify-content-around text-center">
					<div class="col-lg-10">
						<h1 class="bold-title">About <span class="title-highlight">Sandhills</span></h1>
						<p class="bold-description">Time is our single most valuable and limited asset. Our goal is not to waste it. We work to live, for time is one thing we cannot waste. ⏳</p>
					</div>
				</header>
			</div>
		</div>
	</div>

	<section class="about-section">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-xl-4 col-lg-5">
					<div class="quick-facts">
						<div class="facts-wrap">
							<?php
							$quick_facts = shd_quick_facts();
							foreach ( $quick_facts as $fact ) {
								?>
								<div class="small-content-aside-split row justify-content-between">
									<div class="col-lg-3 col-sm-2 col-3 small-aside-split">
										<div class="small-aside-inner">
											<img class="about-icon" src="<?php echo SHD_IMAGES . 'icons/' . $fact['icon'] . '-icon.svg'; ?>">
										</div>
									</div>
									<div class="col-lg-9 col-sm-10 col-12 small-content-split">
										<div class="small-content-inner">
											<span class="small-content-title title-border"><?php echo $fact['title']; ?></span>
											<p class="small-content-description"><?php echo $fact['desc']; ?></p>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="slow-facts">
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="quick-info did-you-know border-on-top">
		<div class="container">
			<div class="row">
				<div class="col">
					<span class="quick-detail nature"><i class="fad fa-trees"></i><strong>Did you know:</strong> Sandhills owns 3 acres of open land in a popular Hutch neighborhood simply to preserve nature as a communal space for people and animals alike.</span>
				</div>
			</div>
		</div>
	</section>

	<section class="team-section stars">
		<div class="container">
			<div class="row text-center justify-content-around">
				<div class="col-lg-8">
					<div class="team-sandhills section-header">
						<span class="our-people-title bold-title">Meet our <span class="title-highlight">Team</span></span>
						<p class="bold-description">We're a team of many talents, working daily to help each other grow professionally. We employ writers, designers, support technicians, developers, marketers, and most importantly, people who care.</p>
					</div>
				</div>
			</div>
			<div class="our-people-row row mb-lg-3">
				<?php get_template_part( 'template-parts/content', 'team-members' ); ?>
			</div>
			<div class="submit-an-app-row row justify-content-around text-center">
				<div class="col-lg-4">
					<p class="member-name">Interested in joining our team?</p>
					<a class="shd-button" href="<?php echo home_url( '/careers/' ); ?>">Work at Sandhills</a>
				</div>
			</div>
		</div>
	</section>

	<section class="quick-info did-you-know border-on-bottom">
		<div class="container">
			<div class="row">
				<div class="col">
					<span class="quick-detail camera"><i class="fad fa-camera-retro"></i><strong>Did you know:</strong> Our microbrewery, Sandhills Brewing, has an awesome Instagram profile full of beer and good times. <a class="quick-info-link" href="https://www.instagram.com/sandhillsbrewing/" target="_blank">Check&nbsp;it&nbsp;out&nbsp;&rarr;</a></span>
				</div>
			</div>
		</div>
	</section>

	<section class="timeline-section">
		<div class="timeline-background-wrap">
			<div class="container">
				<div class="sandhills-history-row row justify-content-around text-center">
					<div class="col-lg-8">
						<h1 class="bold-title">Sandhills <span class="title-highlight">History</span></h1>
						<p class="bold-description">From <?php echo shd_get_team_members_country_count(); ?> different countries around the world, we've slowly come <em>together</em> to create what we believe in, and what makes our customers' lives better.</p>
						<p class="bold-description-secondary">Here's how we did it.</p>
					</div>
				</div>
				<div class="sandhills-timeline-row row justify-content-around">
					<div class="col-lg-10">
						<div class="timeline-wrap">

							<div class="row start-row">
								<div class="col-md-6"></div>
								<div class="col-md-6"></div>
							</div>

							<?php
							// Get an array of each year that has at least one published company event
							$years = shd_get_years_with_events();

							// Each iteration will set the event group row as 'odd' or 'even', enabling alternating styles
							$event_group = 'odd';

							// For each year that has published events, output the year marker,
							// all primary events, and all secondary events
							foreach ( $years as $year ) {

								// Skip non-year values, like Future events
								if ( 0 === $year ) {
									continue;
								}
								?>

								<div class="row new-year-row">
									<div class="col-md-6 events-col new-year-event">
										<div class="new-year-date blue">
											<span class="the-year"><?php echo $year; ?></span>
										</div>
										<div class="events-inner">
										</div>
									</div>
									<div class="col-md-6 additional-info-col">
									</div>
								</div>

								<div class="row event-group-row">

									<div class="col-md-6 events-col<?php echo $event_group === 'odd' ? '' : ' order-md-2'; ?>">
										<div class="events-inner">
											<?php
											// Get all of the Primary events for the current $year in the loop
											$primary_events = shd_get_events_by_group( $year, 'Primary event' );
											foreach ( $primary_events as $p_event ) {
												?>
												<div class="single-event-wrap">
													<p><?php echo $p_event->post_content; ?></p>
												</div>
												<?php
											}
											?>
										</div>
									</div>

									<div class="col-md-6 additional-info-col<?php echo $event_group === 'odd' ? '' : ' order-md-1'; ?>">
										<div class="additional-info-inner">
											<?php
											// Get all of the Secondary events for the current $year in the loop
											$secondary_events = shd_get_events_by_group( $year, 'Secondary event' );
											foreach ( $secondary_events as $s_event ) {
												?>
												<div class="additional-event">
													<p><?php echo $s_event->post_content; ?></p>
												</div>
												<?php
											}
											?>
										</div>
									</div>

								</div>

								<?php
								// Now swap the alignment of events as we output a new year
								$event_group = $event_group === 'odd' ? 'even' : 'odd';
							}
							?>

							<div class="row end-row">
								<div class="col-md-6"></div>
								<div class="col-md-6"></div>
							</div>

						</div>
					</div>
				</div>
				<div class="timeline-end text-center">
					<p>That's <?php echo shd_get_years_in_business(); ?> years and counting. Cheers! 🥂 Here's what to expect in the future.</p>
				</div>
				<div class="sandhills-future-timeline">

					<?php
					// Get all future events
					$future_events = shd_get_future_events();
					foreach ( $future_events as $f_event ) {
						?>
						<div class="sandhills-future-timeline-item row justify-content-around">
							<div class="col-lg-6 future-event-col">
								<div class="future-event">
									<p><?php echo $f_event->post_content; ?></p>
								</div>
							</div>
						</div>
						<?php
					}
					?>

				</div>
			</div>
		</div>
	</section>

<?php
get_footer();

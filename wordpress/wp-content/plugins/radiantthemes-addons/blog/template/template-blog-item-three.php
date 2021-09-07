<?php
/**
 * Template for Blog Item Three.
 *
 * @package RadiantThemes
 */
if ( $data < 2 ) {
	// FIRST AND SECOND LAYOUT.
	$output                             .= '<!-- blog-item -->';
	$output                             .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
		$output                         .= '<div class="row holder">';
			$output                     .= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-left">';
				$output                 .= '<div class="pic matchHeight">';
					$output             .= '<a class="pic-absolute visible-lg visible-md hidden-sm hidden-xs" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></a>';
					$output             .= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'pic-main hidden-lg hidden-md visible-sm visible-xs' ) );
				$output                 .= '</div>';
			$output                     .= '</div>';
			$output                     .= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">';
				$output                 .= '<div class="data matchHeight">';
					$output             .= '<div class="table">';
						$output         .= '<div class="table-cell">';
							$output     .= '<blockquote>';
								$output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
								$output .= '<cite>- ' . get_the_author() . '</cite>';
							$output     .= '</blockquote>';
							$output     .= '<ul class="meta-data">';
								$output .= '<li class="date">' . get_the_date() . '</li>';
								$output .= '<li class="category">' . get_the_category( $query->ID )[0]->name . '</li>';
							$output     .= '</ul>';
						$output         .= '</div>';
					$output             .= '</div>';
				$output                 .= '</div>';
			$output                     .= '</div>';
		$output                         .= '</div>';
	$output                             .= '</article>';
	$output                             .= '<!-- blog-item -->';
	$data++;} elseif ( $data < 4 ) {
	// THIRD AND FOURTH LAYOUT.
	$output                             .= '<!-- blog-item -->';
	$output                             .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
		$output                         .= '<div class="row holder">';
			$output                     .= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">';
				$output                 .= '<div class="pic matchHeight">';
					$output             .= '<a class="pic-absolute visible-lg visible-md hidden-sm hidden-xs" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></a>';
					$output             .= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'pic-main hidden-lg hidden-md visible-sm visible-xs' ) );
				$output                 .= '</div>';
			$output                     .= '</div>';
			$output                     .= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-left">';
				$output                 .= '<div class="data matchHeight">';
					$output             .= '<div class="table">';
						$output         .= '<div class="table-cell">';
							$output     .= '<blockquote>';
								$output .= '<h4 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
								$output .= '<cite>- ' . get_the_author() . '</cite>';
							$output     .= '</blockquote>';
							$output     .= '<ul class="meta-data">';
								$output .= '<li class="date">' . get_the_date() . '</li>';
								$output .= '<li class="category">' . get_the_category( $query->ID )[0]->name . '</li>';
							$output     .= '</ul>';
						$output         .= '</div>';
					$output             .= '</div>';
				$output                 .= '</div>';
			$output                     .= '</div>';
		$output                         .= '</div>';
	$output                             .= '</article>';
	$output                             .= '<!-- blog-item -->';
	$data++;
	} else {
		$data = 0;}

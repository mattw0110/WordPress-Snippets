<?php
/**
 * Genesis Sample Custom Blog
 *
 * This file adds the blog template to the Genesis Sample Theme.
 *
 * Template Name: Blog
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

get_header();

function genesis_sample_landing_body_class( $classes ) {

	$classes[] = 'blog-page';
	return $classes;

}
the_content();

$number_of_posts_per_page = 12;
    $initial_offset = 1;
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    // Use paged if this is not on the front page

    $number_of_posts_past = $number_of_posts_per_page * ($paged - 1);
    $off = $initial_offset + (($paged > 1) ? $number_of_posts_past : 0);

	// WP_Query arguments
    $args = array(
        'post_type' => array('post'),
        'post_status' => array('publish'),
        'posts_per_page' => $number_of_posts_per_page,
        'paged' => $paged,
        'orderby' => 'date',
        'offset' => $off
    );

    // The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {
            echo '<div class="blog wrapper"><div class="row posts-row">'; //start the row

            while ( $query->have_posts() ) {
                    $query->the_post();


                echo '<div class="blog-box">';


                	//display the title
                      echo '<div class="post-image">';
                    the_post_thumbnail('genesis-archive-grid');
                    the_title(sprintf('<h3><a href="%s" >', get_permalink()),'</a></h3>');
                    echo '</div>';

                      echo '<div class="author-info"><p>';
                    the_author();?> - <span><?php the_time( 'F j, Y' );?></span>
                    <?php  echo '</div>';

                      echo '<div class="blog-excerpt">';
                      the_excerpt();
                      echo '</p></div>';


					//get the post permalink
					$permalink = get_permalink();
					echo '<a class="arrow-right" href="' . $permalink . '">READ MORE > > > </a>';

                echo '</div>';//end the blog box and all of it's content



            if ($counter === 3) {
                $counter = 0; //reset counter
				echo '</div>';//end the column
            }

        } // End of the loop

		echo '</div></div>'; //close the row
    wp_reset_postdata();
		//display pagination
    echo '
    <div class="archive-pagination">
        <a class="first page button" href="'.get_pagenum_link(1).'">&laquo;</a>
        <a class="previous page button" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'">&lsaquo;</a>';
        for($i=1;$i<=$query->max_num_pages;$i++)
            echo '<a class="'.($i == $curpage ? 'active ' : '').'page button" href="'.get_pagenum_link($i).'">'.$i.'</a>';
        echo '
        <a class="next page button" href="'.get_pagenum_link(($curpage+1 <= $query->max_num_pages ? $curpage+1 : $query->max_num_pages)).'">&rsaquo;</a>
        <a class="last page button" href="'.get_pagenum_link($query->max_num_pages).'">&raquo;</a>
    </div>
    ';


    }
    else {
            // no posts found
    }




get_footer(); ?>

<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
/*$post_slug = $post->post_name; //get slug of current page
$articles = new WP_Query( array( 'tag' => $post_slug ) );//get articles corresponding to page called
$context['articles'] = $articles; //return articles to context*/
$permalink = get_permalink();

switch ( true ) {
    case strpos($permalink, 'articles'):
        Timber::render( 'single-article.twig', $context );
        break;

    default:
        Timber::render( 'single.twig', $context );

}

<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://heikomamerow.de
 * @since      1.0.0
 *
 * @package    Url_List
 * @subpackage Url_List/admin/partials
 */
?>

<?php
// Collect pages
$urllist_pages = '';
$the_query = new WP_Query(array('post_type' => 'any', 'posts_per_page' => '-1', 'post_status' => 'publish'));
while ($the_query->have_posts()) :
    $the_query->the_post();
    $urllist_pages .= get_the_permalink() . "\n";
endwhile;

// Create txt file and write collectet pages as url list
$urllist_filename = 'url-file.txt';
$urllist_name = plugin_dir_path(dirname(dirname(__FILE__))) . $urllist_filename;
$urllist_handle = fopen($urllist_name, 'w') or die("can't open file");
fwrite($urllist_handle, $urllist_pages);
fclose($urllist_handle);

$urllist_url = plugin_dir_url(dirname(dirname(__FILE__))) . $urllist_filename;
?>


<!-- Stuff to display. -->
<h1>Url list</h1>
<p>This plugin creates a list of all posts & pages from this website in a txt file.</p>
<p>Url list is here: <a href="<?php echo $urllist_url; ?>"><?php echo $urllist_url; ?></a></p>
<p>Have fun! :-)</p>
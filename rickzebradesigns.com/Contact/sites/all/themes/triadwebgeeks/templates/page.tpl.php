<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>
<section class="very-top">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12 text-right">
              	<a href="tel:1-336-880-3741"><i class="fa fa-phone"></i> (336) 880-3741</a>
            </div>
        </div>
    </div>
</section>
<section class="top">

	<div class="container">
    	<div class="row">
        	<div class="col-sm-4">
            	<?php if ($logo): ?>
        <a class="logo navbar-btn pull-left" href="https://www.triadwebgeeks.com" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a><?php endif; ?>
        
            </div>
            <div class="col-sm-8 ">
            <div class="text-right home-link">
            <a href="http://www.rickzebradesigns.com">Back Home</a>	
            </div>
            
            	<?php if ($page['nav-main']):?>					
					<?php print render($page['nav-main']); ?>
					<?php endif;?>
            </div>
          
        </div>
    </div>
</section>

<section class="title-image <?php  
  if (isset ($node)){
             if ($node->nid == 1) {
             print 'ban-webdesign">';
             }elseif ($node->nid == 31){
             print 'ban-responsive">';
             }elseif ($node->nid == 2){
             print 'ban-webredesign">';
             }elseif ($node->nid == 3){
             print 'ban-ecom">';
             }elseif ($node->nid == 4){
             print 'ban-drupal">';
             }elseif ($node->nid == 5){
             print 'ban-development">';
             }elseif ($node->nid == 6){
             print 'ban-hosting">';
             }elseif ($node->nid == 7){
             print 'ban-consulting">';
             }elseif ($node->nid == 35){
             print 'ban-affordable">';
             }elseif ($node->nid == 8){
             print 'ban-seo">';
             }elseif ($node->nid == 9){
             print 'ban-local">';
             }elseif ($node->nid == 10){
             print 'ban-anal">';
             }elseif ($node->nid == 11){
             print 'ban-ad">';
             }elseif ($node->nid == 12){
             print 'ban-google">';
             }elseif ($node->nid == 32){
             print 'ban-copy">';
             }elseif ($node->nid == 13){
             print 'ban-socialmedia">';
             }elseif ($node->nid == 14){
             print 'ban-creativeservices">';
             }elseif ($node->nid == 15){
             print 'ban-graphicdesign">';
             }elseif ($node->nid == 24){
             print 'ban-about">';
             }elseif ($node->nid == 34){
             print 'ban-contact">';
             }elseif ($node->nid == 37){
             print 'ban-port">';
             }elseif ($node->nid == 36){
             print 'ban-services">';
             }else {
             print 'ban-default">';
             }
  }else{
	  print 'ban-default';
  }?>">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<?php if (!empty($title)): ?>
                    <h1 class="page-header"><span class="main-page-title"><?php print $title; ?></span></h1>
                  <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<div class="main-container <?php print $container_class; ?>">

  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->

  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>
<section class="get-started">
	<div class="container">
    	<div class="col-sm-12 text-center">
        	<h2>Ready to Start?<span style="margin-left:1em;"><a href="#" class="btn btn-primary btn-lg">Request A Quote</a></span></h2>
        </div>
    </div>
</section>

<section class="pre-footer">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-4">
            	<?php if (!empty($page['footer'])): ?>
            	<?php print render($page['footer']); ?>
            	<?php endif; ?>
            </div>
            <div class="col-sm-4">
            	<?php if (!empty($page['footer2'])): ?>
            	<?php print render($page['footer2']); ?>
            	<?php endif; ?>
            </div>
            <div class="col-sm-4">
            	<?php if (!empty($page['footer3'])): ?>
            	<?php print render($page['footer3']); ?>
            	<?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="copyright">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12 text-center">
    			<p>&copy; <?php echo date ("Y") ?> Rick Zebra Designs, Thomasville NC</p>
    		</div>
        </div>
    </div>    
</section>

<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

// if (!Configure::read('debug')) :
//     throw new NotFoundException(
//         'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
//     );
// endif;

$cakeDescription = 'Affordable Hotel booking, Cinemas, Conference and Retreat – Clementine Hotel';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['revslider/rs-plugin/css/captions299e.css?rev=4.3.6&amp;ver=4.7.11','LayerSlider/static/css/layerslider3c21.css?ver=5.1.1','style.css?ver=1.12','flexslider4f4a.css?ver=4.7.11','font-awesome.min4f4a.css?ver=4.7.11','responsive4f4a.css?ver=4.7.11','prettyPhoto4f4a.css?ver=4.7.11','custom.css']) ?>

    <?php echo $this->Html->script(array(
      'jquery/jqueryb8ff.js?ver=1.12.4','jquery/jquery-migrate.min330a.js?ver=1.4.1', 'revslider/rs-plugin/js/jquery.themepunch.plugins.min299e.js?rev=4.3.6&amp;ver=4.7.11','revslider/rs-plugin/js/jquery.themepunch.revolution.min299e.js?rev=4.3.6&amp;ver=4.7.11',
    'LayerSlider/static/js/layerslider.kreaturamedia.jquery3c21.js?ver=5.1.1',
    'LayerSlider/static/js/greensock4a80.js?ver=1.11.2',
    'LayerSlider/static/js/layerslider.transitions3c21.js?ver=5.1.1')); ?>


    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    <style type="text/css">

    body{
        font-family: 'Arial';
            font-style: normal;
                font-style: normal;
                font-weight: normal;
                font-size: 12px;
                line-height: 22px;
                color: #666666;

    }
    </style>
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic&amp;subset=latin,greek-ext,vietnamese,latin-ext,greek,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>

    <style type="text/css">

    h1,h2,h3,h4,h5,h6, .subscribe_section label, .widget_calendar  caption{
        font-family: 'Roboto';

    }
    </style>

    <style type="text/css">
    /* CSS Skin */
    a,.primary-nav ul li.current-menu-item a,.top-bar-right a:hover,.primary-nav ul li a:hover,.cpt-filters li a:hover,.cpt-filters li a.selected,
    .blog-title a:hover,.sidebar .widget_nav_menu ul li a:hover,
    .sidebar .widget_nav_menu ul li.current-menu-item a,.st-recent-posts ul li a:hover,.st-recent-posts .recent-date,.footer-social li a:hover,
    .tab-title li.current,  .cpt-detail .cpt-title
    {
        color:#bca474;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;

    }

    input[type="reset"], input[type="submit"], input[type="button"], button,.footer-social li a:hover,.btn_default,.acc-title-active,.toggle_current,
    .st-pagination li a:hover,.ui-datepicker-calendar .ui-state-hover,.ui-datepicker-calendar .ui-state-active,.go-detail,.go-gallery,
    .color ,  .st-pagination li a.page-current,   .st-pagination  li .page-numbers.current , table#wp-calendar thead > tr > th,  table#wp-calendar td#today,
    .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button,
     .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .bg_color:hover
      {
            background-color: #bca474;
            -o-transition:.5s;
            -ms-transition:.5s;
            -moz-transition:.5s;
            -webkit-transition:.5s;
       }


    .flickr_badge_image img:hover, .footer-sidebar .flickr_badge_image img:hover  { border-color:  #bca474;}
    h1{ font-size: 24px;}
    h2{ font-size: 20px;}
    h3{ font-size: 16px;}
    h4{ font-size: 18px;}
    h5{ font-size: 12px;}
    h6{ font-size: 12px;}
    </style>
</head>
<body class="home page-template-default page page-id-1629" >
  <div class="body-outer-wrapper">
   <div class="body-wrapper full-width-mode">

     <header id="header" class="header-container-wrapper">


         <div class="header-outer-wrapper">
             <div class="header-wrapper container">
                 <div class="row">
                     <div class="twelve columns b0">
                         <div class="header-left left">
                             <div class="logo-wrapper" >
                                 <a href="/">
                                   <?=  $this->Html->image("logo.png",['class'=>'img-responsive']) ?>
                                 </a>

                             </div>
                         </div>
                         <div class="header-right right">
                             <a href="#" id="primary-nav-mobile-a" class="primary-nav-close">
                                 <span></span>
                                 Main Navigation                                </a>
                             <nav id="primary-nav-mobile"></nav>

                              <span class="res-btn-w"><a class="btn"  style="background-color: #bca474; " href="booking"><i class="date_icon"></i> Reservation</a></span>
                              <?= $this->element('navbar'); ?>
                             <div class="clear"></div>
                         </div>
                         <div class="clear"></div>
                     </div>
                     <div class="clear"></div>
                 </div>
             </div><!-- END .header-wrapper -->
         </div><!-- END .header-outer-wrapper -->
     </header> <!-- END .header-container-wrapper -->
     <div class="main-outer-wrapper no-titlebar">
        <div class="main-wrapper container">

             <div class="row row-wrapper">
                 <div class="page-outer-wrapper">

                     <div class="page-wrapper twelve columns left-sidebar b0">
                         <div class="row">
         <div class="twelve columns b0">

             <div class="page-title-wrapper">
                     <h1 class="page-title left">Now Showing</h1>
                     <div class="page-title-alt right">

                     </div>
                     <div class="clear"></div>
                 </div>
         </div>
     </div>

     <div class="row">
       <?php foreach ($movies as $movie): ?>
     <div class="content-wrapper three columns b0">
       <?=  $this->Html->link($this->Html->image("../files/Movies/photo/".$movie->photo,['fullbase' => true]).'<br><h1>'.$movie->title.'</h1>',['controller'=>'movies','action' => 'view', $movie->id],['escape'=>false]); ?>
     </div>
  <?php endforeach; ?>
     </div>

     <div class="row">
    <div class="twelve columns b0">

    <div class="page-title-wrapper">
    <h1 class="page-title left">Upcoming Movies</h1>
    <div class="page-title-alt right">

    </div>
    <div class="clear"></div>
    </div>
    </div>
    </div>

    <div class="row">
    <?php foreach ($movies1 as $movie): ?>
    <div class="content-wrapper three columns b0">
    <?=  $this->Html->link($this->Html->image("../files/Movies/photo/".$movie->photo,['fullbase' => true]).'<br><h1>'.$movie->title.'</h1>',['controller'=>'movies','action' => 'view', $movie->id],['escape'=>false]); ?>
    </div>
    <?php endforeach; ?>
    </div>
                         <div class="row">

                         <div class="content-wrapper eight columns b0">


                                  <div class="page-content">


                     <div class="page-featured-image cpt-thumb-wrapper">


             </div>

             <div class="text-content">



             </div>
             <div class="clear"></div>
      </div><!-- END page-content-->

         <div class="page-single-element">


             <div class="clear"></div>
         </div><!-- Single Page Element -->                         </div>

                          <div class="right-sidebar-wrapper four columns">
                             </div>

                              <div class="clear"></div>
                         </div>


                                   </div><!-- END .page-wrapper -->

            <div class="clear"></div>

            </div><!-- page-outer-wrapper -->

         </div><!-- END .row-wrapper -->

         <div class="clear"></div>

         </div><!-- main-wrapper  -->
          </div><!-- END .main-outer-wrapper  -->

          <footer id="footer" class="footer-outer-wrapper">
          				<div class="footer-wrapper container">
          													 <div class="footer-columns row footer-sidebar">
          								<div class="three columns">
          																				</div>
          								 <div class="three columns">
          								 <h3 class="banner-title"> Stay Connected! Sign up for Newsletter</h3>

          																				 </div>
          								 <div class="three columns">
          Please send me exclusive deals, travel inspiration and updates
          																				 </div>
          								 <div class="three columns">
          																				</div>
          								<div class="clear"></div>
          						</div>

          						<div class="footer-copyright-wrapper row">
          								<div class="twelve columns">
          										<div class="footer-copyright">
          												<div class="copy-left left">
          														&copy; 2018 <a href="/" title=""><strong>Cinema Movies</strong></a>                            </div>
          												<div class="copy-social right">
          														<ul class="footer-social">
          																																	 <li class="stay_connected">Stay Connected</li>
          																<li class="social-facebook"><?=  $this->Html->link("Facebook",array("target"=>"_blank")) ?></li>
          														</ul>
          												</div>
          												<div class="clear"></div>
          										</div>
          								</div>
          								<div class="clear"></div>
          						</div>
          				</div> <!-- END .footer-wrapper -->

          		</footer> <!-- END .footer-outer-wrapper -->


          </div><!-- END .body-wrapper -->
          </div><!-- END .body-outer-wrapper -->
          <a href="tel:xxx" id="callnowbutton" onclick="ga('send', 'event', 'Contact', 'Call Now Button', 'Phone');">&nbsp;</a><div id="sttotop" class="bg_color"><i class="icon-angle-up"></i></div>
          <script type='text/javascript'>
          /* <![CDATA[ */
          var FS = {"animation":"fade","animationLoop":"false","slideshow":"false","slideshowSpeed":"7000","animationSpeed":"6000","pauseOnAction":"false","pauseOnHover":"false","controlNav":"true","randomize":"false","directionNav":"true","nextText":"<i class=\"icon-chevron-right\"><\/i>","prevText":"<i class=\"icon-chevron-left\"><\/i>"};
          var ajaxurl = "index.html\/\/www.clementine.com.ng\/en\/wp-admin\/admin-ajax.php";
          /* ]]> */
          </script>
<?php echo $this->Html->script(array('hotec.min2f3e.js?ver=1.12','wp-embed.min4f4a.js?ver=4.7.11')) ?>
</body>
</html>

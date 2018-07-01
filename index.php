<?php

/**
 *	Name:			AVATARIZER
 *	Description: 	Easily create custom avatars
 *
 *	Author:			ANEX
 *	Author URL:		http://anex.at
 *
 *	Version:		1.0.0
 */

if( file_exists( 'app/settings.php' ) )
	require_once 'app/settings.php';
	
if( file_exists('app/functions.php' ) )
	require_once 'app/functions.php';

?>

<html>

	<head>
    
		<title><?php echo avatarizer_info( 'name' ); ?></title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css" />
        
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        
		<link rel="stylesheet" href="app/assets/css/base.css"/>
        
	</head>
    
	<body>
    
    	<!-- HEADER > START -->
    	<header class="header">
        
        	<div class="container-fluid">
            
            	<div class="row">
                
                    <div class="col-sm-12 col-md-7">
                    
                        <div class="logo">
                        
                            <a href="<?php echo avatarizer_info( 'url' ); ?>">
                            	<img src="content/images/logo-website.png" />
                            </a>
                            
                            <?php
							
								if ( isset( $_GET['pro'] ) && $_GET['pro'] == PASSWORD ) {
									echo '<span class="pro-mode-active">Pro Mode</span>';
								}
															
								if ( isset( $_GET['skylord'] ) && $_GET['skylord'] == TRUE ) {
									echo '<span class="skylord-mode-active">SkyLord Mode</span>';
								}

							?>
                        </div>
                        
                    </div>
                    
                    <div class="col-sm-12 col-md-5">
                    
                    	<div class="menu">
                        	<ul>
                            	<li><a class="social-network-icon" target="_blank" data-toggle="tooltip" href="https://facebook.com/skylordcommunity" title="Like us on Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            	<li><a class="social-network-icon" target="_blank" data-toggle="tooltip" href="https://twitter.com/SkyL_Community" title="Follow us on Twitter"><i class="fab fa-twitter"></i></a></li>
                            	<li><a class="social-network-icon" target="_blank" data-toggle="tooltip" href="https://instagram.com/skylordcommunity" title="Follow us on Instagram"><i class="fab fa-instagram"></i></a></li>
                            	<li><a class="social-network-icon" target="_blank" data-toggle="tooltip" href="https://www.youtube.com/channel/UC17ZR6bCKRFzaP0ngj0TVMQ" title="Subscribe on our Youtube"><i class="fab fa-youtube"></i></a></li>
                            	<li><a class="social-network-icon" target="_blank" data-toggle="tooltip" href="https://www.twitch.tv/skylordcommunity" title="Follow us on Twitch"><i class="fab fa-twitch"></i></a></li>
                            	<li><a class="social-network-icon" target="_blank" data-toggle="tooltip" href="http://steamcommunity.com/groups/skylordgaming" title="Join our Steam Group"><i class="fab fa-steam"></i></a></li>
                            	<li><a class="social-network-icon" target="_blank" data-toggle="tooltip" href="https://shop.spreadshirt.net/skylord-gaming" title="Browse our Store"><i class="fas fa-shopping-cart"></i></a></li>
                            	<li><a class="social-network-icon" target="_blank" data-toggle="tooltip" href="https://discord.io/skylord" title="Join our Discord"><i class="fab fa-discord"></i></a></li>
                            </ul>
                        </div>
                    
                    </div>
                
                </div>
            
            </div>
        
        </header>
    	<!-- HEADER > END -->
        
    	<!-- MAIN > START -->
        <main class="main">
        
            <div class="container-fluid">
            
                <?php /*?><div class="row">
                
                    <div class="col-md-12">
                    
                        <div class="info">
                            <p>Create your custom avatar. Just drag and drop a background image of your choice on this screen and then download your new avatar.</p>
                        </div>
                        
                    </div>
                    
                </div><?php */?>    
                
                <div class="row">
                
                    <div class="col-sm-12 col-md-6 col-lg-4">
                    
                    	<div class="panel">
                    
                            <h4>Preview</h4>

                            <div class="avatar-wrap">
                        
                                <!-- BEGIN: Canvas rendering of generated Meme -->
                                <canvas id="avatar" class="img-thumbnail img-fluid">
                                    Unfortunately your browser does not support canvas.
                                </canvas>
                                <!-- END: Canvas rendering of generated Meme -->
                                
								<?php if ( isset( $_GET['skylord'] ) && $_GET['skylord'] == TRUE ) { ?>
                                    <div class="droppable"></div>
                                <?php } else { ?>
                                    <div class="droppable droppable-inactive"></div>
                                <?php } ?>

                                <img id="avatar-back" class="avatar-back" src="content/images/backgrounds/default.jpg" alt="" />
                                <img id="avatar-front" class="avatar-front" src="content/images/icons/icon-light.png" alt="" />
                                                            
                            </div>
                            
                            <?php if ( isset( $_GET['skylord'] ) && $_GET['skylord'] == TRUE ) { ?>
                                <div class="file-upload-wrap">
                                    <input type="file" class="form-control" id="file-upload" />
                                </div>
							<?php } ?>
                            
                            <div class="download">
                            
                                <a href="javascript:;" class="button" id="download_avatar">
                                    <i class="fas fa-cloud-download-alt" aria-hidden="true"></i> Download
                                </a>
                            
                            </div>
                        
                        </div>
                        
                    </div>
                    
                    <div class="col-sm-12 col-md-6 col-lg-8">
                    
                    	<div class="panel">
                    
                            <h4>1. Choose your icon</h4>
                        
                            <div class="icons">
                            
                                <div class="row">
                                
                                    <div class="col col-xs-12 col-sm-4 col-md-2">
                                        <a href="#" class="thumbnail icon-light active">
                                            <img src="content/images/icons/icon-light.png" alt="" />
                                        </a>
                                    </div>
                                    <div class="col col-xs-12 col-sm-4 col-md-2">
                                        <a href="#" class="thumbnail icon-dark">
                                            <img src="content/images/icons/icon-dark.png" alt="" />
                                        </a>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    	<div class="panel">
                        
                            <h4>2. Choose your background</h4>
                                                                                   
                            <div class="backgrounds">
                            
                                <div class="row">
                                
                                    <div class="col-sm-12">
                                    
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                            
                                                <div class="swiper-slide">
                                                    <a href="#" class="thumbnail active">
                                                        <img src="content/images/backgrounds/default.jpg" alt="" />
                                                    </a>
                                                </div>

												<?php if ( ( isset( $_GET['pro'] ) && $_GET['pro'] == 'skylord' ) || ( isset( $_GET['skylord'] ) && $_GET['skylord'] == TRUE ) ) { ?>
													<?php foreach( avatarizer_backgrounds_pro() as $file ) { ?>
                                                        <div class="swiper-slide">
                                                            <a href="#" class="thumbnail">
                                                                <img src="content/images/backgrounds/pro/<?php echo $file ?>" alt="" />
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>
                                            
                                                <?php foreach( avatarizer_backgrounds_basic() as $file ) { ?>
                                                    <div class="swiper-slide">
                                                        <a href="#" class="thumbnail">
                                                            <img src="content/images/backgrounds/basic/<?php echo $file ?>" alt="" />
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                                
                                            </div>
                                            <div class="swiper-scrollbar"></div>
                                        </div>
                                         
                                    </div> 
                                
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    	<div class="panel">
                        
                            <h4>3. Choose overlay opacity</h4>
                                                                                   
                            <div class="overlay">
                            
                                <div class="row">
                                
                                    <div class="col-sm-12">
                                                                           
                                    	<input id="overlay-opacity" type="range" min="0" max="100" value="50" step="10">
                                                                             
                                    </div> 
                                                                
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                                        
            </div>
        
        </main>
    	<!-- MAIN > END -->
        
    	<!-- FOOTER > START -->
        <footer class="footer">
        
        	<div class="container-fluid">
            
            	<div class="row">
                
                    <div class="col-md-12">
                    
                        <div class="copyright">
                            <span>Made with <i class="fas fa-heart"></i> by <a href="http://skylord.pro" target="_blank">SkyLord Gaming</a></span> - <span>Copyright &copy; 2018</span> - <a href="http://skylord.pro/imprint" target="_blank">Imprint</a>
                        </div>
                        
                    </div>
                
                </div>
            
            </div>
        
        </footer>
    	<!-- FOOTER > END -->
	
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
    
	<script type="text/javascript" src="app/assets/js/app.js"></script>
	
	</body>
</html>
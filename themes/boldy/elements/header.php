<?php    defined('C5_EXECUTE') or die("Access Denied."); ?>
<!DOCTYPE html PUBLIC"-// W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head profile="http://gmpg.org/xfn/11">

	<?php    Loader::element('header_required'); ?>

	<?
	global $themeBoldyBodyId;
	
	// Theme setup options (TODO: setup via theme setup or similar)
	$isRtlHomepage = false;

	// State indicators
	$isHomepage = ($c->getCollectionID() == HOME_CID);

	// Check if the site uses multiple languages
	$switchLanguageBT = BlockType::getByHandle('switch_language');
	
	// Find page locale and directionality
	if ($switchLanguageBT) {
		// Multilingual website
		$switchLanguageSH = Loader::helper('section', 'multilingual');
		if ($isHomepage) {
			// Homepage
			$logoSuffix = '_home';
			$isRtlPage = $isRtlHomepage;

		} else {
			// Regular page in a given language
			$lang = $switchLanguageSH::getLocale();
			$direction = Zend_Locale_Data::getList($lang, 'layout', 'characters');
			
			$logoSuffix = '_'.$lang;		
			$isRtlPage = ($direction['characters'] == 'right-to-left');
		}

	} else {
		// Single language website - use default directionality
		$logoSuffix = '';
		$isRtlPage = $isRtlHomepage;
	}

	$rtlSuffix = ($isRtlPage ? '-rtl' : '');
	?>
	
	<link href="<?php   echo $this->getThemePath()?>/style<?= $rtlSuffix ?>.css" rel="stylesheet" type="text/css" />
	<link href="<?php   echo $this->getThemePath()?>/css/ddsmoothmenu<?= $rtlSuffix ?>.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php   echo $this->getThemePath()?>/js/ddsmoothmenu.js"></script>
	<script type="text/javascript" src="<?php   echo $this->getThemePath()?>/js/custom.js"></script>
	<script type="text/javascript" src="<?php   echo $this->getThemePath()?>/js/cufon-yui.js"></script>
	<script type="text/javascript" src="<?php   echo $this->getThemePath()?>/js/Museo_Slab_500_400.font.js"></script>
	<script type="text/javascript">
	<?php   
	if(!$c->iseditmode()) {?>
		ddsmoothmenu.init({
			mainmenuid: "mainMenu", //menu DIV id
			orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
			classname: 'ddsmoothmenu', //class added to menu's outer DIV
			contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
		})
	<?php    } ?>
		Cufon.replace('h1',{hover: true})('h2',{hover: true})('h3')('.reply',{hover:true})('.more-link');
	</script>
</head>
<body<?= ($themeBoldyBodyId ? ' id="'.$themeBoldyBodyId.'"' : '') ?>>
	<div id="mainWrapper">
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<h1>
						<?
						if ($logoSuffix) {
							// Multilingual - use a global logo area per language
							$a = new GlobalArea("Logo$logoSuffix");
							$a->display($c);
							
						} else {
							// Single language - fallback to original code
						?>
							<a href="<?php   echo DIR_REL?>/">
								<?php    $block=Block::getByName('My_Site_Name');
								if( $block && $block->bID ) $block->display();   
								else echo SITE;
								?>
							</a>
						<?
						}
						?>
					</h1>
				</div>
				<div id="mainMenu" class="ddsmoothmenu">
					<?
					if ($logoSuffix == '_home') {
						// Homepage of a multilingual site
						$a = new Area('HomeMenu');
						$a->display($c);
						
					} else {
						$bt = BlockType::getByHandle('autonav');
						$bt->controller->displayPages = ($logoSuffix ? 'second_level' : 'top');
						$bt->controller->orderBy = 'display_asc';
						$bt->controller->displaySubPages = 'all';
						$bt->controller->displaySubPageLevels = 'all';
//						$bt->controller->displaySubPageLevels = 'custom';
//						$bt->controller->displaySubPageLevelsNum = '3';
						$bt->render('templates/header_menu_dropdown');
					}
					?>
				</div>
				<div id="langSelection">
					<?
					if ($switchLanguageBT) {
						$switchLanguageBT->controller->label = '';
						$switchLanguageBT->render('templates/seo_flags/view');
					}
					?>
				</div>
				<?php    $page = Page::getByPath('/search/search-results');
				if(!$page->isError()) {?>
					<div id="topSearch">
						<form id="searchform" action="<?php   echo $this->url('/search/search-results/');?>" method="get">
							<input name="search_paths[]" type="hidden" value=""/>
							<input name="submit" type="submit" id="searchsubmit" value=""/>
							<input name="query" type="text" id="s" class="s" value="Search..."/>
						</form>
					</div>
				<?php    } ?>
				<div id="topSocial">
					<ul>
					<?php 
					if(is_object(Loader::package('theme_options_lite'))) {
						Loader::model('social', 'theme_options_lite');
						$twitter = Social::getByHandle('twitter');
						$linkedin = Social::getByHandle('linkedin');
						$facebook = Social::getByHandle('facebook');
						$rss = Social::getByHandle('rss');

						if(is_object($linkedin) && $linkedin->getValue() != '') { ?>
							<li>
								<a href="<?php  echo $linkedin->getValue()?>" class="linkedin" title="Join us on LinkedIn!">
									<img src="<?php   echo $this->getThemePath()?>/images/ico_linkedin.png" alt="LinkedIn" />
								</a>
							</li>
						<?php  }
						if(is_object($twitter) && $twitter->getValue() != '') {?>
							<li>
								<a href="<?php  echo $twitter->getValue()?>" class="twitter" title="Follow Us on Twitter!">
									<img src="<?php   echo $this->getThemePath()?>/images/ico_twitter.png" alt="Follow Us on Twitter!" />
								</a>
							</li>
						<?php  }
						if(is_object($facebook) && $facebook->getValue() != '') {?>
						<li>
							<a href="<?php  echo $facebook->getValue()?>" class="facebook" title="Join Us on Facebook!">
								<img src="<?php   echo $this->getThemePath()?>/images/ico_facebook.png" alt="Join Us on Facebook!" />
							</a>
						</li>
						<?php  }
						if(is_object($rss) && $rss->getValue() != '') {?>
						<li>
							<a href="<?php  echo $rss->getValue()?>" title="RSS" class="rss">
								<img src="<?php   echo $this->getThemePath()?>/images/ico_rss.png" alt="Subcribe to Our RSS Feed" />
							</a>
						</li>
					<?php  }
					}
					?>
					</ul>
				</div>	
			</div>
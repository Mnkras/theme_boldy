<?php      

defined('C5_EXECUTE') or die(_("Access Denied."));

class ThemeBoldyPackage extends Package {

	protected $pkgHandle = 'theme_boldy';
	protected $appVersionRequired = '5.4.1';
	protected $pkgVersion = '2.0';
		
	public function getPackageName() {
		return t("Boldy");
	}
	
	public function getPackageDescription() {
		return t("Installs the Boldy theme.");
	}
	
	public function install() {
		$pkg = parent::install();
		
		PageTheme::add('boldy', $pkg);
		
		if(is_object(Loader::package('theme_options_lite'))) {
			Loader::model('social', 'theme_options_lite');
			$twitter = Social::getByHandle('twitter');
			$linkedin = Social::getByHandle('linkedin');
			$facebook = Social::getByHandle('facebook');
			$rss = Social::getByHandle('rss');
			if(!is_object($twitter)) {
				Social::add('twitter', 'Twitter');
			}
			if(!is_object($linkedin)) {
				Social::add('linkedin', 'LinkedIn');
			}
			if(!is_object($facebook)) {
				Social::add('facebook', 'Facebook');
			}
			if(!is_object($rss)) {
				Social::add('rss', 'RSS');
			}
		}
	}
	
	public function upgrade() {
		parent::upgrade();
		
		if(is_object(Loader::package('theme_options_lite'))) {
			Loader::model('social', 'theme_options_lite');
			$twitter = Social::getByHandle('twitter');
			$linkedin = Social::getByHandle('linkedin');
			$facebook = Social::getByHandle('facebook');
			$rss = Social::getByHandle('rss');
			if(!is_object($twitter)) {
				Social::add('twitter', 'Twitter');
			}
			if(!is_object($linkedin)) {
				Social::add('linkedin', 'LinkedIn');
			}
			if(!is_object($facebook)) {
				Social::add('facebook', 'Facebook');
			}
			if(!is_object($rss)) {
				Social::add('rss', 'RSS');
			}
		}
	}
	
}
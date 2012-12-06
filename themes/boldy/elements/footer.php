<?php    defined('C5_EXECUTE') or die("Access Denied."); ?>
		<div id="footer">
			<div style="width:960px; margin: 0 auto; position:relative;">
				<a href="#" id="showHide">Show/Hide Footer Actions</a>
			</div>
			<div id="footerActions">
				<div id="footerActionsInner">
					<?php   
					$a=new Area('Footer');
					$a->display($c);
					?>
				</div>
			</div>
			<div id="footerWidgets">
				<div id="footerWidgetsInner">
					<div class="boxFooter">
						<?php   
						$a=new Area('Column 1');
						$a->display($c);
						?>
					</div>
					<div class="boxFooter">
						<?php   
						$a=new Area('Column 2');
						$a->display($c);
						?>
					</div>
					<div class="boxFooter">
						<?php   
						$a=new Area('Column 3');
						$a->display($c);
						?>
					</div>
					<div class="boxFooter">
						<?php   
						$a=new Area('Column 4');
						$a->display($c);
						?>
					</div>
					<div id="copyright">
						&copy; <?php   echo date('Y')?> <a href="<?php   echo DIR_REL?>/"><?php   echo SITE?></a>. 
						<?php   echo t('All rights reserved.')?>
						<br />
						<?php   
						$u = new User();
						if ($u->isRegistered()) { ?>
							<?php    
							if (Config::get("ENABLE_USER_PROFILES")) {
								$userName = '<a href="' . $this->url('/profile') . '">' . $u->getUserName() . '</a>';
							} else {
								$userName = $u->getUserName();
							}
							?>
							<?php   echo t('Currently logged in as <b>%s</b>.', $userName)?> <a href="<?php   echo $this->url('/login', 'logout')?>"><?php   echo t('Sign Out')?></a>
						<?php    } else { ?>
							<a href="<?php   echo $this->url('/login')?>"><?php   echo t('Sign In to Edit this Site')?></a>
						<?php    } ?>
						<br /><a href="http://www.concrete5.org" title="<?php   echo t('concrete5 - open source content management system for PHP and MySQL')?>"><?php   echo t('concrete5 - open source CMS')?></a>

						<div id="sitebottomright">
							Theme by <a href="http://site5.com/" target="_blank">Site5</a>. Converted by <a href="http://mnkras.com/" target="_blank">Mnkras</a>.
						</div>
					</div>
				</div>	
			</div>
		</div>	
	</div>
	<?php    Loader::element('footer_required'); ?>
	</body>
</html>

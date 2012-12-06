<?php    defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>
			<div id="content">
				<div id="colLeft">
					<?php    
					$a=new Area('Main');
					$a->display($c);
					?>
				</div>
				<div id="colRight">
					<?php    
					$a=new Area('Sidebar');
					$a->setBlockWrapperStart('<div class="rightBox">');
					$a->setBlockWrapperEnd('</div>');
					$a->display($c);
					?>
				</div>
			</div>
		</div>
<?php    $this->inc('elements/footer.php'); ?>
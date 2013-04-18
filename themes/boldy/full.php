<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header.php', array('themeBoldyBodyId' => 'portfolio'));
?>

			<div id="content">
				<div id="colFull">
				<div style="clear:both"></div>
					<?php    
					$a=new Area('Main');
					$a->display($c);
					?>
				</div>
			</div>
		</div>
<?php    $this->inc('elements/footer.php'); ?>
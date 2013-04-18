<?php
defined('C5_EXECUTE') or die("Access Denied.");

global $themeBoldyBodyId;	// Force specific body ID
$themeBoldyBodyId = 'portfolio';

$this->inc('elements/header.php');
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
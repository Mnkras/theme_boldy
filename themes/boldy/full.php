<?php    defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/fullheader.php'); ?>
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
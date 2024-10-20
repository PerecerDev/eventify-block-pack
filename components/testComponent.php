<?php function testComponent() { ob_start(); ?>
<h1>FIRST COMPONENT TEST</h1>
<?php return ob_get_clean(); } ?>
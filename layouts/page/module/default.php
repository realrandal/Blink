<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.Page
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

$modules = $this->renderPosition();
if (!$modules) return;
?>
<!-- Module position: <?php echo $this->position; ?> -->
<div class="uk-panel-box">
	<?php echo $modules; ?>
</div>

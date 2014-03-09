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
?>
<?php if (isset($this->rss)) : ?>
<div class="uk-float-right"><?php echo $this->rss; ?></div>
 
<?php endif; ?>

<?php if (($time = $this->getTime()) !== null) : ?>
<p>
<small>
	<?php echo JText::sprintf('COM_KUNENA_VIEW_COMMON_FOOTER_TIME', $time); ?>
</small>
</p>
<?php endif; ?>

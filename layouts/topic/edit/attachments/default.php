<?php
/**
 * Kunena Component
 * @package Kunena.Template.Blink
 * @subpackage Topic
 *
 * @copyright (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();
?>
<ul class="thumbnails">
	<?php foreach($this->attachments as $attachment) : ?>
	<li class="span6">
		<div class="thumbnail">
			<input type="hidden" name="attachments[<?php echo $attachment->id ?>]"
			       value="<?php echo $attachment->getFilename() ?>" />
			<input type="checkbox" name="attachment[<?php echo $attachment->id ?>]" checked="checked"
			       value="<?php echo $attachment->id ?>" />
			<?php echo $attachment->getThumbnailLink(); ?>
			<span>
				<?php echo $attachment->getFilename(); ?>
				<?php echo '('.number_format(intval($attachment->size)/1024,0,'',',').'KB)'; ?>
			</span>
			<a href="#" class="uk-button pull-right">
				<?php echo JText::_('COM_KUNENA_EDITOR_INSERT'); ?>
			</a>
		</div>
	</li>
	<?php endforeach; ?>
</ul>

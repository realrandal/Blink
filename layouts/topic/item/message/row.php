<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.Topic
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

if ($this->message->id == $this->selected)
{
	$link = $this->message->displayField('subject');
}
else
{
	$link = $this->getTopicLink(
		$this->message->getTopic(), $this->message, $this->message->displayField('subject')
	);
}
?>
<tr class="message-<?php echo $this->message->getState(); ?>">
	<td class="message-<?php echo $this->message->isNew() ? 'new' : 'read'; ?>">
		<span class="<?php echo implode('"></span><span class="ktree ktree-', $this->message->indent); ?>"></span>
		<?php echo $link; ?>
	</td>
	<td>
		<?php echo $this->message->getAuthor()->getLink(); ?>
	</td>
	<td title="<?php echo $this->message->getTime()->toKunena('config_post_dateformat_hover'); ?>">
		<?php echo $this->message->getTime()->toKunena('config_post_dateformat'); ?>
	</td>
</tr>

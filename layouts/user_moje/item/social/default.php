<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.User
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

$showAll = isset($this->showAll) ? $this->showAll : false;
?>
<div>
	<?php echo $this->profile->socialButton('twitter', $showAll); ?>
	<?php echo $this->profile->socialButton('facebook', $showAll); ?>
	<?php echo $this->profile->socialButton('skype', $showAll); ?>
</div>

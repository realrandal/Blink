<?php
/**
 * Kunena Component
 * @package Kunena.Template.Blink
 * @subpackage Common
 *
 * @copyright (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();
?>
<div class="mobile">
<ul class="nav pull-left">
		<li class="dropdown"> <a href="#" class="uk-button btn-navbar" data-toggle="dropdown"> <i class="icon-large icon-user"></i> <b class="caret"></b> </a>
				<div class="dropdown-menu uk-panel-box">
						<form action="<?php echo KunenaRoute::_('index.php?option=com_kunena'); ?>" method="post" id="logout-form" class="form-inline">
								<div class="center"> <a href="<?php  echo $this->me->getURL(); ?>"> <?php echo $this->me->getAvatarImage('img-polaroid'); ?> </a>
										<p> <strong><?php echo $this->escape($this->me->get('name')); ?></strong> </p>
								</div>
								<div class="divider"></div>
								<?php if ($this->me->isModerator()) : ?>
								<div> <a href="<?php echo $this->announcesListLink ?>" class="uk-button btn-link"> <i class="icon-pencil-2"></i> <?php echo JText::_('COM_KUNENA_ANN_ANNOUNCEMENTS') ?> </a> </div>
								<?php endif; ?>
								<?php if (!empty($this->privateMessagesLink)) : ?>
								<div> <a href="<?php echo $this->privateMessagesLink ?>" class="uk-button btn-small btn-link"> <i class="icon-mail"></i> Inbox: </a> </div>
								<?php endif ?>
								<div> <a href="<?php echo $this->me->getUrl (false, 'edit') ?>" class="uk-button btn-small btn-link"> <i class="icon-cog"></i> <?php echo JText::_('COM_KUNENA_LOGOUTMENU_LABEL_PREFERENCES') ?> </a> </div>
								<div> <a href="http://www.kunena.org/docs/" class="uk-button btn-small btn-link"> <i class="icon-help"></i> <?php echo JText::_('COM_KUNENA_LOGOUTMENU_LABEL_HELP') ?> </a> </div>
								<div class="divider"></div>
								<button class="uk-button btn-small btn-link" name="submit" type="submit"> <i class="icon-out"></i> <?php echo JText::_('COM_KUNENA_PROFILEBOX_LOGOUT'); ?> </button>
								<input type="hidden" name="view" value="user" />
								<input type="hidden" name="task" value="logout" />
								<?php echo JHtml::_('form.token'); ?>
						</form>
				</div>
		</li>
</ul>
<ul class="nav pull-right">
		<a class="uk-button btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <i class="icon-large icon-list"></i> <b class="caret"></b> </a>
		<div class="nav-collapse collapse"><?php echo $this->subRequest('Page/Menu'); ?></div>
</ul>
</div>
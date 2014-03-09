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

JHtml::_('behavior.formvalidation');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.keepalive');

$this->addScriptDeclaration('config_attachment_limit = '.$this->config->attachment_limit );

$editor = KunenaBbcodeEditor::getInstance();
$editor->initialize('id');

$this->addScriptDeclaration("window.addEvent('domready', function() {
	if ( typeof pollcategoriesid != 'undefined' ) {
		var catid = $('kcategory_poll').get('value');
		if ( pollcategoriesid[catid] !== undefined ) {
			kbbcode.addFunction('Poll', function() {
				kToggleOrSwap('kbbcode-poll-options');
			}, {'id': 'kbbcode-poll-button',
				'class': 'kbbcode-poll-button',
				'title': Joomla.JText._('COM_KUNENA_EDITOR_POLL'),
				'alt': Joomla.JText._('COM_KUNENA_EDITOR_HELPLINE_POLL')});

		} else {
			kbbcode.addFunction('Poll', function() {
				kToggleOrSwap('kbbcode-poll-options');
			}, {'id': 'kbbcode-poll-button',
				'class': 'kbbcode-poll-button',
				'style':'display: none;',
				'title': Joomla.JText._('COM_KUNENA_EDITOR_POLL'),
				'alt': Joomla.JText._('COM_KUNENA_EDITOR_HELPLINE_POLL')});
		}
	}
	kEditorInitialize();
});");

$this->k=0;
?>

<form action="<?php echo KunenaRoute::_('index.php?option=com_kunena') ?>" method="post" class="form-horizontal"
      id="postform" name="postform" enctype="multipart/form-data" onsubmit="return myValidate(this);">
	<input type="hidden" name="view" value="topic" />
	<input id="kcategory_poll" type="hidden" name="kcategory_poll" value="<?php echo $this->message->catid; ?>" />
	<input id="kpreview_url" type="hidden" name="kpreview_url" value="<?php echo KunenaRoute::_('index.php?option=com_kunena&view=topic&layout=edit&format=raw', false) ?>" />
	<?php if ($this->message->exists()) : ?>
	<input type="hidden" name="task" value="edit" />
	<input type="hidden" name="mesid" value="<?php echo intval($this->message->id) ?>" />
	<?php else: ?>
	<input type="hidden" name="task" value="post" />
	<input type="hidden" name="parentid" value="<?php echo intval($this->message->parent) ?>" />
	<?php endif; ?>
	<?php if (!isset($this->selectcatlist)) : ?>
	<input type="hidden" name="catid" value="<?php echo intval($this->message->catid) ?>" />
	<?php endif; ?>
	<?php if ($this->category->id && $this->category->id != $this->message->catid) : ?>
	<input type="hidden" name="return" value="<?php echo intval($this->category->id) ?>" />
	<?php endif; ?>
	<?php echo JHtml::_( 'form.token' ); ?>

	<h2>
		<?php echo $this->escape($this->headerText)?>
	</h2>

	<div class="well">
		<div class="row-fluid column-row">
			<div class="span12 column-item" >
				<fieldset class="pull-left">
					<?php if (isset($this->selectcatlist)): ?>
					<div class="control-group">
						<!-- Username -->
						<label class="control-label"><?php echo JText::_('COM_KUNENA_CATEGORY')?></label>
						<div class="controls"> <?php echo $this->selectcatlist?> </div>
					</div>
					<?php endif; ?>
					<?php if ($this->message->userid) : ?>
					<div class="control-group" id="kanynomous-check" <?php if (!$this->category->allow_anonymous): ?>style="display:none;"<?php endif; ?>>
						<label class="control-label"><?php echo JText::_('COM_KUNENA_POST_AS_ANONYMOUS'); ?></label>
						<div class="controls">
							<input type="checkbox" id="kanonymous" name="anonymous" value="1" <?php if ($this->post_anonymous) echo 'checked="checked"'; ?> />
							<label for="kanonymous"><?php echo JText::_('COM_KUNENA_POST_AS_ANONYMOUS_DESC'); ?></label>
						</div>
					</div>
					<?php endif; ?>
					<div class="control-group" id="kanynomous-check-name"
						<?php if ( $this->me->userid && !$this->category->allow_anonymous ): ?>style="display:none;"<?php endif; ?>>
						<label class="control-label"><?php echo JText::_('COM_KUNENA_GEN_NAME'); ?></label>
						<div class="controls">
							<input type="text" id="kauthorname" name="authorname" size="35" class="input-xxlarge required" maxlength="35" value="<?php echo $this->escape($this->message->name);?>" />
						</div>
					</div>
					<?php if ($this->config->askemail && !$this->me->userid) : ?>
					<div class="control-group">
						<label class="control-label"><?php echo JText::_('COM_KUNENA_GEN_EMAIL');?></label>
						<div class="controls">
							<input type="text" id="email" name="email"	size="35" class="input-xxlarge required validate-email" maxlength="35" value="<?php echo !empty($this->message->email) ? $this->escape($this->message->email) : '' ?>" />
							<br />
							<?php echo $this->config->showemail == '0' ? JText::_('COM_KUNENA_POST_EMAIL_NEVER') : JText::_('COM_KUNENA_POST_EMAIL_REGISTERED'); ?> </div>
					</div>
					<?php endif; ?>
					<div class="control-group">
						<label class="control-label"><?php echo JText::_('COM_KUNENA_GEN_SUBJECT'); ?></label>
						<div class="controls">
							<input class="input-xxlarge required" type="text" placeholder="Subject" name="subject" id="subject" maxlength="<?php echo $this->escape($this->config->maxsubject); ?>" value="<?php echo $this->escape($this->message->subject); ?>" tabindex="1" />
						</div>
					</div>
					<?php if (!empty($this->topicIcons)) : ?>
						<div class="control-group">
							<label class="control-label"><?php echo JText::_('COM_KUNENA_GEN_TOPIC_ICON'); ?></label>
							<div class="controls">
								<?php foreach ($this->topicIcons as $id=>$icon): ?>
									<span class="kiconsel">
										<label for="radio<?php echo $icon->id ?>">
										<input type="radio" id="radio<?php echo $icon->id ?>" name="topic_emoticon" value="<?php echo $icon->id ?>" <?php echo !empty($icon->checked) ? ' checked="checked" ':'' ?> />
										<img src="<?php echo $this->template->getTopicIconIndexPath($icon->id, true);?>" alt="" border="0" /> 
										</label>
									</span>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
					<?php
					// Show bbcode editor
					echo $this->subLayout('Topic/Edit/Editor')->setProperties($this->getProperties());
					?>
					<?php if ($this->allowedExtensions) : ?>
					<div class="control-group krow<?php echo 1 + $this->k^=1;?>" id="kpost-attachments">
						<label class="control-label"><?php echo JText::_('COM_KUNENA_EDITOR_ATTACHMENTS'); ?></label>
						<div class="controls">
							<div id="kattachment-id" class="kattachment"> <span class="kattachment-id-container"></span>
								<input class="kfile-input-textbox" type="text" readonly="readonly" />
								<div class="kfile-hide hasTip" title="<?php echo JText::_('COM_KUNENA_FILE_EXTENSIONS_ALLOWED')?>::<?php echo $this->escape(implode(', ', $this->allowedExtensions)) ?>" >
									<input type="button" value="<?php echo	JText::_('COM_KUNENA_EDITOR_ADD_FILE'); ?>" class="kfile-input-button btn" />
									<input id="kupload" class="kfile-input" name="kattachment" type="file" />
								</div>
								<a href="#" class="kattachment-remove btn" style="display: none"><?php echo	JText::_('COM_KUNENA_GEN_REMOVE_FILE'); ?></a> <a href="#" class="kattachment-insert btn" style="display: none"><?php echo	JText::_('COM_KUNENA_EDITOR_INSERT'); ?></a> </div>
							<?php
							if (!empty($this->attachments))
								echo $this->subLayout('Topic/Edit/Attachments')
									->set('attachments', $this->attachments);
							?>
						</div>
					</div>
					<?php endif; ?>
					<?php if ($this->config->keywords && $this->me->isModerator ( $this->topic->getCategory() ) ) : ?>
					<div class="control-group">
						<label class="control-label"><?php echo JText::_('COM_KUNENA_EDITOR_TOPIC_TAGS') ?></label>
						<div class="controls">
							<input type="text" class="kinputbox postinput" name="tags" id="tags" size="35" maxlength="100" value="<?php echo $this->escape($this->topic->getKeywords(false, ', ')); ?>" />
						</div>
					</div>
					<?php endif; ?>
					<?php if ($this->config->userkeywords && $this->me->userid) : ?>
					<div class="control-group">
						<label class="control-label"><?php echo JText::_('COM_KUNENA_EDITOR_TOPIC_TAGS_OWN') ?></label>
						<div class="controls">
							<input type="text" class="kinputbox postinput" name="mytags" id="mytags" size="35" maxlength="100" value="<?php echo $this->escape($this->topic->getKeywords($this->me->userid, ', ')); ?>" />
						</div>
					</div>
					<?php endif; ?>
					<?php if ($this->canSubscribe) : ?>
					<div class="control-group">
						<label class="control-label"><?php echo JText::_('COM_KUNENA_POST_SUBSCRIBE'); ?></label>
						<div class="controls">
							<input style="float: left; margin-right: 10px;" type="checkbox" name="subscribeMe" id="subscribeMe" value="1" <?php if ($this->subscriptionschecked == 1) echo 'checked="checked"' ?> />
							<label class="string optional" for="subscribeMe"><?php echo JText::_('COM_KUNENA_POST_NOTIFIED'); ?></label>
						</div>
					</div>
					<?php endif; ?>
					<?php if (!empty($this->captchaHtml)) : ?>
					<div class="control-group">
						<label class="control-label"><?php echo JText::_('COM_KUNENA_CAPDESC'); ?></label>
						<div class="controls"> <?php echo $this->captchaHtml ?> </div>
					</div>
					<?php endif; ?>
					<div class="center">
						<input type="submit" name="ksubmit" class="uk-button btn-primary"
						value="<?php echo (' ' . JText::_('COM_KUNENA_SUBMIT') . ' ');?>"
						title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_SUBMIT'));?>" tabindex="4" />
						<input type="button" name="preview" class="uk-button"
						onclick="kToggleOrSwapPreview('kbbcode-preview-bottom')"
						value="<?php echo (' ' . JText::_('COM_KUNENA_PREVIEW') . ' ');?>"
						title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_PREVIEW'));?>:: "tabindex="3" />
						<input type="button" name="cancel" class="uk-button"
						value="<?php echo (' ' . JText::_('COM_KUNENA_CANCEL') . ' ');?>"
						onclick="javascript:window.history.back();"
						title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_CANCEL'));?>" tabindex="5" />
					</div>
				</fieldset>
			</div>
		</div>
	</div>
	<?php
if (!$this->message->name) {
	echo '<script type="text/javascript">document.postform.authorname.focus();</script>';
} else if (!$this->topic->subject) {
	echo '<script type="text/javascript">document.postform.subject.focus();</script>';
} else {
	echo '<script type="text/javascript">document.postform.message.focus();</script>';
}
?>
</form>
<?php
if ($this->config->showhistory && $this->topic->exists())
	echo $this->subRequest('Topic/Form/History', new JInput(array('id'=>$this->topic->id)));
?>

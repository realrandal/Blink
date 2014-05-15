<?php
/**
 * Kunena Component
 * @package Kunena.Template.Crypsis
 * @subpackage Topic
 *
 * @copyright (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();

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

<form action="<?php echo KunenaRoute::_('index.php?option=com_kunena') ?>" method="post" class="uk-form uk-form-horizontal"
      id="postform" name="postform" enctype="multipart/form-data">
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

	<h2 class="uk-margin-top-remove">
		<?php echo $this->escape($this->headerText)?>
	</h2>

	<div>
 
	 
				<fieldset>
					<?php if (isset($this->selectcatlist)): ?>
					<div class="uk-form-row">
						<!-- Username -->
						<label class="uk-form-label"><?php echo JText::_('COM_KUNENA_CATEGORY')?></label>
						<div class="uk-form-controls"> <?php echo $this->selectcatlist?> </div>
					</div>
					<?php endif; ?>
					<?php if ($this->message->userid) : ?>
					<div class="uk-form-row" id="kanynomous-check" <?php if (!$this->category->allow_anonymous): ?>style="display:none;"<?php endif; ?>>
						<label class="uk-form-label"><?php echo JText::_('COM_KUNENA_POST_AS_ANONYMOUS'); ?></label>
						<div class="uk-form-controls">
							<input type="checkbox" id="kanonymous" name="anonymous" value="1" <?php if ($this->post_anonymous) echo 'checked="checked"'; ?> />
							<label for="kanonymous"><?php echo JText::_('COM_KUNENA_POST_AS_ANONYMOUS_DESC'); ?></label>
						</div>
					</div>
					<?php endif; ?>
					<div class="uk-form-row" id="kanynomous-check-name"
						<?php if ( $this->me->userid && !$this->category->allow_anonymous ): ?>style="display:none;"<?php endif; ?>>
						<label class="uk-form-label"><?php echo JText::_('COM_KUNENA_GEN_NAME'); ?></label>
						<div class="uk-form-controls">
							<input type="text" id="kauthorname" name="authorname" size="35" placeholder="<?php echo JText::_('COM_KUNENA_TOPIC_EDIT_PLACEHOLDER_AUTHORNAME') ?>" class="uk-form-width-large" maxlength="35" value="<?php echo $this->escape($this->message->name);?>" required />
						</div>
					</div>
					<?php if ($this->config->askemail && !$this->me->userid) : ?>
					<div class="uk-form-row">
						<label class="uk-form-label"><?php echo JText::_('COM_KUNENA_GEN_EMAIL');?></label>
						<div class="uk-form-controls">
							<input type="text" id="email" name="email"	size="35" placeholder="<?php echo JText::_('COM_KUNENA_TOPIC_EDIT_PLACEHOLDER_EMAIL') ?>" class="uk-form-width-large" maxlength="35" value="<?php echo !empty($this->message->email) ? $this->escape($this->message->email) : '' ?>" required />
							<br />
							<?php echo $this->config->showemail == '0' ? JText::_('COM_KUNENA_POST_EMAIL_NEVER') : JText::_('COM_KUNENA_POST_EMAIL_REGISTERED'); ?> </div>
					</div>
					<?php endif; ?>
					<div class="uk-form-row">
						<label class="uk-form-label"><?php echo JText::_('COM_KUNENA_GEN_SUBJECT'); ?></label>
						<div class="uk-form-controls">
							<input class="uk-form-width-large" type="text" placeholder="<?php echo JText::_('COM_KUNENA_TOPIC_EDIT_PLACEHOLDER_SUBJECT') ?>" name="subject" id="subject" maxlength="<?php echo $this->escape($this->config->maxsubject); ?>" value="<?php echo $this->escape($this->message->subject); ?>" tabindex="1" required />
						</div>
					</div>
					<?php if (!empty($this->topicIcons)) : ?>
          <div class="uk-form-row">
          	<label class="uk-form-label"><?php echo JText::_('COM_KUNENA_GEN_TOPIC_ICON'); ?></label>
          	<div class="uk-form-controls">
          		<?php foreach ($this->topicIcons as $id=>$icon): ?>
            	<span class="kiconsel">
              <input type="radio" id="radio<?php echo $icon->id ?>" name="topic_emoticon" value="<?php echo $icon->id ?>" <?php echo !empty($icon->checked) ? ' checked="checked" ':'' ?> />
              <label for="radio<?php echo $icon->id ?>"><img src="<?php echo $this->template->getTopicIconIndexPath($icon->id, true);?>" alt="" border="0" /> </label></span>
              <?php endforeach; ?>
             </div>
          </div>
          <?php endif; ?>
					<?php
					// Show bbcode editor
					echo $this->subLayout('Topic/Edit/Editor')->setProperties($this->getProperties());
					?>
					<?php if ($this->allowedExtensions) : ?>
					<div class="uk-form-row" id="kpost-attachments">
						<label class="uk-form-label"><?php echo JText::_('COM_KUNENA_EDITOR_ATTACHMENTS'); ?></label>
						<div class="uk-form-controls">
							<div id="kattachment-id" class="kattachment"> <span class="kattachment-id-container"></span>
								<input class="kfile-input-textbox" type="text" readonly />
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
					<div class="uk-form-row">
						<label class="uk-form-label"><?php echo JText::_('COM_KUNENA_EDITOR_TOPIC_TAGS') ?></label>
						<div class="uk-form-controls">
							<input type="text" class="kinputbox postinput" name="tags" id="tags" size="35" maxlength="100" value="<?php echo $this->escape($this->topic->getKeywords(false, ', ')); ?>" />
						</div>
					</div>
					<?php endif; ?>
					<?php if ($this->config->userkeywords && $this->me->userid) : ?>
					<div class="uk-form-row">
						<label class="uk-form-label"><?php echo JText::_('COM_KUNENA_EDITOR_TOPIC_TAGS_OWN') ?></label>
						<div class="uk-form-controls">
							<input type="text" class="kinputbox postinput" name="mytags" id="mytags" size="35" maxlength="100" value="<?php echo $this->escape($this->topic->getKeywords($this->me->userid, ', ')); ?>" />
						</div>
					</div>
					<?php endif; ?>
					<?php if ($this->canSubscribe) : ?>
					<div class="uk-form-row">
						<label class="uk-form-label"><?php echo JText::_('COM_KUNENA_POST_SUBSCRIBE'); ?></label>
						<div class="uk-form-controls">
							<input type="checkbox" name="subscribeMe" id="subscribeMe" value="1" <?php if ($this->subscriptionschecked == 1) echo 'checked="checked"' ?> />
							<label class="string optional" for="subscribeMe"><?php echo JText::_('COM_KUNENA_POST_NOTIFIED'); ?></label>
						</div>
					</div>
					<?php endif; ?>
					<?php if (!empty($this->captchaHtml)) : ?>
					<div class="uk-form-row">
						<label class="uk-form-label"><?php echo JText::_('COM_KUNENA_CAPDESC'); ?></label>
						<div class="uk-form-controls"> <?php echo $this->captchaHtml ?> </div>
					</div>
					<?php endif; ?>
					<div class="uk-text-center uk-margin">
						<input type="submit" name="ksubmit" class="uk-button uk-button-success uk-button-large"
						value="<?php echo (' ' . JText::_('COM_KUNENA_SUBMIT') . ' ');?>"
						title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_SUBMIT'));?>" tabindex="4" />
						<input type="button" name="preview" class="uk-button"
						onclick="kToggleOrSwapPreview('kbbcode-preview-bottom controls')"
						value="<?php echo (' ' . JText::_('COM_KUNENA_PREVIEW') . ' ');?>"
						title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_PREVIEW'));?>:: "tabindex="3" />
						<input type="button" name="cancel" class="uk-button"
						value="<?php echo (' ' . JText::_('COM_KUNENA_CANCEL') . ' ');?>"
						onclick="javascript:window.history.back();"
						title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_CANCEL'));?>" tabindex="5" />
					</div>
				</fieldset>
		 
	 
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

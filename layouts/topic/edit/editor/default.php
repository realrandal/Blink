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

// Kunena bbcode editor
?>


<!-- Start extendable secondary toolbar -->
<tr>
	<td class="kpostbuttons">
		
		<div id="kbbcode-color-options" style="display: none;">
			<script type="text/javascript">kGenerateColorPalette('4%', '15px');</script>
		</div>
		<div id="kbbcode-link-options" style="display: none;"> <?php echo JText::_('COM_KUNENA_EDITOR_LINK_URL'); ?>&nbsp;
			<input id="kbbcode-link_url" name="url" type="text" size="40" value="http://"
					onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_LINKURL', true); ?>')" />
			<?php echo JText::_('COM_KUNENA_EDITOR_LINK_TEXT'); ?>&nbsp;
			<input name="text2" id="kbbcode-link_text" type="text" size="30" maxlength="150"
					onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_LINKTEXT', true); ?>')" />
			<input type="button" name="insterLink" value="<?php echo JText::_('COM_KUNENA_EDITOR_INSERT'); ?>"
					onclick="kbbcode.focus().replaceSelection('[url=' + document.id('kbbcode-link_url').get('value') + ']' + document.id('kbbcode-link_text').get('value') + '[/url]', false); kToggleOrSwap('kbbcode-link-options');"
					onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_LINKAPPLY', true); ?>')" />
		</div>
		<div id="kbbcode-image-options" style="display: none;"> <?php echo JText::_('COM_KUNENA_EDITOR_IMAGELINK_SIZE'); ?>&nbsp;
			<input id="kbbcode-image_size" name="size" type="text" size="10" maxlength="10"
					onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_IMAGELINKSIZE', true); ?>')" />
			<?php echo JText::_('COM_KUNENA_EDITOR_IMAGELINK_URL'); ?>&nbsp;
			<input name="url2" id="kbbcode-image_url" type="text" size="40" value="http://"
					onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_IMAGELINKURL', true); ?>')" />
			&nbsp;
			<input type="button" name="Link" value="<?php echo JText::_('COM_KUNENA_EDITOR_INSERT'); ?>" onclick="kInsertImageLink()"
					onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_IMAGELINKAPPLY', true); ?>')" />
		</div>
		<?php if (!$this->message->parent && isset($this->poll)) : ?>
			<div id="kbbcode-poll-options" style="display: none;" class="kpoll">
				<?php JHtml::_('behavior.calendar'); ?>
				<label class="kpoll-title-lbl" for="kpoll-title"><?php echo JText::_('COM_KUNENA_POLL_TITLE'); ?></label>
				<input type="text" class="inputbox" name="poll_title" id="kpoll-title"
						maxlength="100" size="40"
						value="<?php echo $this->escape( $this->poll->title ) ?>"
						onmouseover="document.id('helpbox').set('value', '<?php
						echo JText::_('COM_KUNENA_EDITOR_HELPLINE_POLLTITLE', true); ?>')" />
				<i id="kbutton-poll-add" class="icon-plus"
						onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_ADDPOLLOPTION', true); ?>')" alt="<?php echo JText::_('COM_KUNENA_POLL_ADD_POLL_OPTION'); ?>"> </i> <i id="kbutton-poll-rem" class="icon-minus" onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_REMPOLLOPTION', true); ?>')" alt="<?php echo JText::_('COM_KUNENA_POLL_REMOVE_POLL_OPTION'); ?>"> </i>
				<label class="kpoll-term-lbl" for="kpoll-time-to-live"><?php echo JText::_('COM_KUNENA_POLL_TIME_TO_LIVE'); ?></label>
				<?php echo JHtml::_('calendar', isset($this->poll->polltimetolive) ? $this->escape($this->poll->polltimetolive) : '0000-00-00', 'poll_time_to_live', 'kpoll-time-to-live', '%Y-%m-%d',array('onmouseover'=>'document.id(\'helpbox\').set(\'value\', \''.JText::_('COM_KUNENA_EDITOR_HELPLINE_POLLLIFESPAN', true).'\')')); ?>
				<div id="kpoll-alert-error" class="alert" style="display:none;">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo JText::sprintf('COM_KUNENA_ALERT_WARNING_X', JText::_('COM_KUNENA_POLL_NUMBER_OPTIONS_MAX_NOW')) ?>
				</div>
				<?php
					if($this->poll->exists()) {
						$x = 1;
						foreach ($this->poll->getOptions() as $poll_option) {
							echo '<div class="polloption">Option '.$x.' <input type="text" maxlength = "25" id="field_option'.$x.'" name="polloptionsID['.$poll_option->id.']" value="'.$poll_option->text.'" onmouseover="document.id(\'helpbox\').set(\'value\', \''.JText::_('COM_KUNENA_EDITOR_HELPLINE_OPTION', true).'\')" /></div>';
							$x++;
						}
					}
					?>
				<input type="hidden" name="nb_options_allowed" id="nb_options_allowed" value="<?php echo $this->config->pollnboptions; ?>" />
				<input type="hidden" name="number_total_options" id="numbertotal"
						value="<?php echo ! empty ( $this->polloptionstotal ) ? $this->escape($this->polloptionstotal) : '' ?>" />
			</div>
		<?php endif;

		if (!$this->config->disemoticons) : ?>
 
		</div>
		<?php endif;

			if (($codeTypes = $this->getCodeTypes())) :
			?>
			<div id="kbbcode-code-options" style="display: none;">
				<?php echo $codeTypes; ?>
				<input id="kbutton_addcode" type="button" name="Code" onclick="kInsertCode()" value="<?php echo JText::_('COM_KUNENA_EDITOR_CODE_INSERT'); ?>"
					onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_CODEAPPLY', true); ?>')" />
			</div>
			<?php endif;

		 ?>

 
<div class="uk-form-row">
	<label class="uk-form-label"><?php echo (JText::_('COM_KUNENA_MESSAGE')) ; ?></label>
 
	<div class="uk-form-controls">
		<textarea class="uk-form-width-large qreply" name="message" id="kbbcode-message" rows="12" tabindex="3" required="required"><?php echo $this->escape($this->message->message); ?></textarea>
	</div>
	<!-- Hidden preview placeholder -->
	<div class="uk-form-controls" id="kbbcode-preview" style="display: none;"></div>
</div>

<?php if ($this->message->exists()) : ?>
<div class="uk-form-row">
	<label class="uk-form-label"><?php echo (JText::_('COM_KUNENA_EDITING_REASON')) ?></label>
	<div class="uk-form-controls">
		<input class ="uk-form-width-large" placeholder="Wpisz powód edycji, aby wyróżnić poprawioną wiadomość" name="modified_reason" size="40" maxlength="200" type="text" value="<?php echo $this->modified_reason; ?>" />
	</div>
</div>	
<?php endif; ?>

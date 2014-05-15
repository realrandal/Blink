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

$this->addScriptDeclaration('// <![CDATA[
var kunena_anonymous_name = "'.JText::_('COM_KUNENA_USERNAME_ANONYMOUS').'";
// ]]>');

$this->pagination->setDisplayedPages(4);

$category = $this->topic->getCategory();

?>
<?php if ($this->category->headerdesc) : ?>
<div class="alert alert-info">
	<a class="close" data-dismiss="alert" href="#">&times;</a>
	<?php echo $this->category->displayField('headerdesc'); ?>
</div>
<?php endif; ?>

<ul class="uk-breadcrumb topic-categories"> 
<li><a href="forum"><i class="uk-icon-comments-o uk-icon-small"></i></a></li>
 	<?php if ($category->parent_id) : ?>
	<li><?php echo $this->getCategoryLink($category->getParent(), $this->escape($category->getParent()->name)); ?></li>
	<?php endif; ?>
	<li><?php echo $this->getCategoryLink($category, $this->escape($category->name)); ?></li>
</ul>

<div class="uk-margin uk-clearfix topic-actions">
	
	<div class="uk-float-right">
		<?php echo $this->subLayout('Pagination/List')->set('pagination', $this->pagination); ?>
	</div>
	<?php echo $this->subRequest('Topic/Item/Actions')->set('id', $this->topic->id); ?>

</div>

<?php
echo $this->subLayout('Page/Module')->set('position', 'kunena_topictitle');
echo $this->subRequest('Topic/Poll')->set('id', $this->topic->id);
echo $this->subLayout('Page/Module')->set('position', 'kunena_poll'); ?>

<div class="uk-grid">
	<div class="uk-width-custom topic-title-bar">
		<div class="uk-navbar main-topic-title">		
			<h3 class="uk-float-left uk-margin-remove">
				<?php echo $this->topic->getIcon(); ?>
				<?php echo $this->topic->displayField('subject'); ?>
			</h3>

			<div class="uk-float-right signs-switch">
				<button class="uk-button notify-me uk-tip signs-switcher signs-off" data-message="<i class='uk-icon-eye-slash'></i> Stopki ukryto!" data-status="warning" title="Ukryj stopki pod wiadomościami (szybsze przeglądanie tematu)"><i class="uk-icon-eye-slash"></i></button>
				<button class="uk-button notify-me uk-tip signs-switcher signs-on" data-message="<i class='uk-icon-eye'></i> Stopki widoczne <i class='uk-icon-smile-o'></i>" data-status="success" title="Pokaż stopki pod wiadomościami"><i class="uk-icon-eye"></i></button>
			</div>		

		</div>
	</div>
</div>

<script>
jQuery(function($) {
		$(document).ready(function () {
		   $( ".message-title:not(:contains('<?php echo $this->topic->displayField('subject'); ?>'))" ).removeClass( "uk-hidden" );
		  
		});
});

</script>

<div class="topic-messages">
<?php foreach ($this->messages as $id => $message)
{
	echo $this->subRequest('Topic/Item/Message')
		->set('mesid', $message->id)
		->set('location', $id);
}
?>
</div>

<script>
jQuery(function($) {
 		$( ".user-toggle" ).click(function() {
  			$(this).parents(".topic-message").first().toggleClass( "open-info" );
		});
});
</script>

<div class="topic-actions uk-margin">

	<div class="uk-float-right">
		<?php echo $this->subLayout('Pagination/List')->set('pagination', $this->pagination); ?>
	</div>
	<?php echo $this->subRequest('Topic/Item/Actions')->set('id', $this->topic->id); ?>

</div>

<div class="uk-container-center pagination-buttons uk-clearfix"><?php echo $this->subLayout('Pagination/Buttons')->set('pagination', $this->pagination); ?></div>

<?php echo $this->subLayout('Category/Moderators')->set('moderators', $this->category->getModerators(false)); ?>

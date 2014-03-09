<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Template
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

 



/**
 * Blink template.
 */
class KunenaTemplateBlink extends KunenaTemplate
{
	/**
	 * List of parent template names.
	 *
	 * This template will automatically search for missing files from listed parent templates.
	 * The feature allows you to create one base template and only override changed files.
	 *
	 * @var array
	 */
	protected $default = array('blink');

	/**
	 * Relative paths to various file types in this template.
	 *
	 * These will override default files in JROOT/media/kunena
	 *
	 * @var array
	 */
	protected $pathTypes = array(
		'emoticons' => 'media/emoticons',
		'ranks' => 'media/ranks',
		'icons' => 'media/icons',
		'topicicons' => 'media/topicicons',
		'images' => 'media/images',
		'js' => 'media/js',
		'css' => 'media/css'
	);

	protected $userClasses = array(
		'kwho-',
		'admin'=>'kwho-admin',
		'globalmod'=>'kwho-globalmoderator',
		'moderator'=>'kwho-moderator',
		'user'=>'kwho-user',
		'guest'=>'kwho-guest',
		'banned'=>'kwho-banned',
		'blocked'=>'kwho-blocked'
	);

	/**
	 * Default category icons.
	 *
	 * @var array
	 */
	public $categoryIcons = array(
		'kreadforum',
		'kunreadforum'
	);

	/**
	 * Logic to load language strings for the template.
	 *
	 * By default language files are also loaded from the parent templates.
	 *
	 * @return void
	 */
	public function loadLanguage()
	{
		$lang = JFactory::getLanguage();
		KunenaFactory::loadLanguage('com_kunena.templates', 'site');

		foreach (array_reverse($this->default) as $template)
		{
			$file = "kunena_tmpl_{$template}";
			$lang->load($file, JPATH_SITE)
				|| $lang->load($file, KPATH_SITE)
				|| $lang->load($file, KPATH_SITE . "/template/{$template}");
		}
	}

	/**
	 * Template initialization.
	 *
	 * @return void
	 */
	public function initialize()
	{
		// Template NOOOOOT requires Mootools 1.4+ framework.
		// $this->loadMootools(); 			<<<<<<<<< NEVER ENABLE IT ANYMORE - LEFT IT JUST FOR  THIS INFO!
		// JHtml::_('behavior.tooltip'); 	<<<<<<<<< NEVER ENABLE IT ANYMORE - LEFT IT JUST FOR  THIS INFO! WE USE OTHER PLUGINS IF WE NEED IT
		// JHtml::_('bootstrap.modal');<	<<<<<<<<< NEVER ENABLE IT ANYMORE - LEFT IT JUST FOR  THIS INFO! WE USE OTHER PLUGINS IF WE NEED IT
		// JHtml::_('formbehavior.chosen'); <<<<<<<<< NEVER ENABLE IT ANYMORE - LEFT IT JUST FOR  THIS INFO! WE USE OTHER PLUGINS IF WE NEED IT

		// Template also requires jQuery framework.
		// JHtml::_('jquery.framework');
		

		// $this->addScript('js/cookies.js');  // TODO MAKE IT CONDITIONALY LOADING in template params - Already loaded by Joomla template
		$this->addScript('js/timeago.js');  

		$this->addStyleSheet ( 'css/wbbtheme.css' );
		$this->addScript ( 'js/jquery.wysibb.js' ); // <<<<<<<<< NEW POWER IS HERE!

		$this->addScript('js/custom.js');  

		// New Kunena JS for default template 
		$this->addScript ( 'js/plugins.js' );  
		
		
		


		// Compile CSS from LESS files.
		$this->compileLess('main.less', 'blink.css');
		$this->addStyleSheet('blink.css');

		$config = KunenaFactory::getConfig();

		// If polls are enabled, load also poll JavaScript.
		// if ($config->pollenabled == 1)
		// {
		// 	JText::script('COM_KUNENA_POLL_OPTION_NAME');
		// 	JText::script('COM_KUNENA_EDITOR_HELPLINE_OPTION');
		// 	$this->addScript('poll.js');                 
		// }

		// If enabled, load also MediaBox advanced.
		if ($config->lightbox == 1)
		{
			// TODO: replace with new plugin
            
		}

		parent::initialize();
	}

	public function addStyleSheet($filename, $group='forum')
	{
		$filename = $this->getFile($filename, false, '', "media/kunena/cache/{$this->name}/css");
		return JFactory::getDocument()->addStyleSheet(JUri::root(true)."/{$filename}");
	}

	public function getButton($link, $name, $scope, $type, $id = null)
	{
		$types = array('communication'=>'comm', 'user'=>'user', 'moderation'=>'mod', 'permanent'=>'mod');
		$names = array('unfavorite'=>'favorite', 'unsticky'=>'sticky', 'unlock'=>'lock', 'create'=>'newtopic',
				'quickreply'=>'quick-reply', 'quote'=>'quote', 'edit'=>'edit', 'permdelete'=>'delete',
				'flat'=>'layout-flat', 'threaded'=>'layout-threaded', 'indented'=>'layout-indented',
				'list'=>'reply');

		// Need special style for buttons in drop-down list
		$buttonsDropdown = array('delete', 'unsticky', 'sticky', 'unlock', 'lock', 'moderate', 'undelete', 'permdelete');

		$text = JText::_("COM_KUNENA_BUTTON_{$scope}_{$name}");
		$title = JText::_("COM_KUNENA_BUTTON_{$scope}_{$name}_LONG");

		if ($title == "COM_KUNENA_BUTTON_{$scope}_{$name}_LONG") $title = '';

		if ($id) $id = 'id="'.$id.'"';

		if ( in_array($name,$buttonsDropdown) )
		{
			return <<<HTML
				<li><a class="{$name}" $id style="" href="{$link}" rel="nofollow" title="{$title}">
				{$text}
				</a></li>
HTML;
		}
		else
		{
			return <<<HTML
				<a $id class="uk-button {$name}" style="" href="{$link}" rel="nofollow" title="{$title}">
 				{$text}
				</a>
HTML;
		}
	}

	public function getIcon($name, $title='')
	{ 
		return ' <i class="uk-icon-'.$name.' uk-tip" title="'.$title.'"></i> '; 
	}

	public function getImage($image, $alt='')
	{
		return '<span src="'.$this->getImagePath($image).'" alt="'.$alt.'" />';  
	}

}

<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Blink
 * @subpackage  Layout.BBCode
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

// [url="www.kunena.org" target="_blank"]Kunena.org[/url]

// Display URL.
$target = ' target="' . $this->escape($this->target) . '"';
?>
<a href="<?php echo $this->escape($this->url); ?>" class="bbcode_url" rel="nofollow"<?php echo $this->target; ?>>
	<?php echo $this->content; ?>
</a>

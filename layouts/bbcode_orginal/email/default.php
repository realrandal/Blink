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

// [email]john.doe@domain.com[/email]
// [email=john.doe@domain.com]John Doe[/email]

// Display email address (cloak it).
echo JHtml::_(
	'email.cloak',
	$this->escape($this->email), $this->mailto,
	$this->escape($this->text), $this->textCloak
);

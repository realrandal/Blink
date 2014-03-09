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

/** @var KunenaUser $user */
$user = $this->user;
$avatar = $user->getAvatarImage('img-aravatarar', 200);
$show = KunenaConfig::getInstance()->showuserstats;
if ($show)
{
	$rankImage = $user->getRank(0, 'image');
	$rankTitle = $user->getRank(0, 'title');
	$personalText = $user->getPersonalText();
}
?>

<?php if ($user->exists()) : ?>

	<div class="uk-width-custom user-info user-info-box hidden-info uk-float-left">
		<div class="user-info-bar uk-clearfix">

			<?php if ($avatar) : ?>
				<a href="#hide-profile" title="Rozwiń profil" class="user-toggle user-toggle-full"><?php echo $user->getAvatarImage('author-avatar-full', 160, 160); ?></a>
			<?php endif; ?>

			<ul class="uk-list user-info-list uk-clearfix">

				<li>
					<div class="author-name-big">

					<?php echo $this->userLink ?>
					<?php echo $user->username ?></div>
				</li>

				<?php if (!empty($rankTitle)) : ?>
					<li>
						<?php echo $this->escape($rankTitle); ?>
					</li>
				<?php endif; ?>

				<?php if (!empty($rankImage)) : ?>
					<li>
						<?php echo $rankImage; ?>
					</li>
				<?php endif; ?>

				<?php if (!empty($personalText)) : ?>
					<li>
						<?php echo $personalText; ?>
					</li>
				<?php endif; ?>

				<?php if ($show) : ?>
					<li>
						<?php echo JText::_('COM_KUNENA_POSTS') . ' ' . (int) $user->posts; ?>
					</li>
				<?php endif; ?>

				<?php if ($show && isset($user->thankyou)) : ?>
					<li>
						<?php echo JText::_('COM_KUNENA_MYPROFILE_THANKYOU_RECEIVED') . ' ' . (int) $user->thankyou; ?>
					</li>
				<?php endif; ?>

				<?php if ($show && isset($user->points)) : ?>
					<li>
						<?php echo JText::_('COM_KUNENA_AUP_POINTS') . ' ' . (int) $user->points; ?>
					</li>
				<?php endif; ?>

				<?php if ($show && !empty($user->medals)) : ?>
					<li>
						<?php echo implode(' ', $user->medals); ?>
					</li>
				<?php endif; ?>

			</ul>

			<div class="uk-float-left">
				<?php echo $user->profileIcon('gender'); ?>
				<?php echo $user->profileIcon('birthdate'); ?>
				<?php echo $user->profileIcon('location'); ?>
				<?php echo $user->profileIcon('website'); ?>
				<?php echo $user->profileIcon('private'); ?>
				<?php echo $user->profileIcon('email'); ?>
			</div>

		</div>		
	</div>		

<?php endif ?>


<div class="uk-width-custom message-author">
	<div class="topic-message-author">
		<a href="#show-profile" title="Rozwiń profil" class="user-toggle mini-user-info">
			<?php if ($avatar) : ?>
				<div class="author-avatar-box"><?php echo $user->getAvatarImage('author-avatar', 67, 67); ?></div>				
			<?php endif; ?>

			<author class="author-name"><?php echo $user->username ?></author>

			<span class="uk-badge <?php echo $user->isOnline('uk-badge-success', 'uk-hidden') ?> online-status">
				<?php echo $user->isOnline(JText::_('COM_KUNENA_ONLINE'), JText::_('COM_KUNENA_OFFLINE')); ?>
			</span>
		</a>	
	</div>
</div>



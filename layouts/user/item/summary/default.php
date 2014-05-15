<?php
/**
 * Kunena Component
 * @package     Kunena.Template.Crypsis
 * @subpackage  Layout.User
 *
 * @copyright   (C) 2008 - 2014 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die;

/** @var KunenaUser $profile */
$profile = $this->profile;
$me = KunenaUserHelper::getMyself();
$avatar = $profile->getAvatarImage('img-rounded', 128, 128);
$banInfo = $this->config->showbannedreason
	? KunenaUserBan::getInstanceByUserid($profile->userid)
	: null;
$private = $profile->getPrivateMsgURL();
$privateLabel = $profile->getPrivateMsgLabel();
$email = $profile->getEmailLink();
$websiteURL = $profile->getWebsiteURL();
$websiteName = $profile->getWebsiteName();
$personalText = $profile->getPersonalText();
$signature = $profile->getSignature();

if ($this->config->showuserstats)
{
	$rankImage = $profile->getRank(0, 'image');
	$rankTitle = $profile->getRank(0, 'title');
}
?>

 
 
		<?php if ($avatar) : ?>
				 
		<div class="uk-float-left">
     	<?php echo $avatar; ?>
 		<span class="uk-badge uk-badge-<?php echo $this->profile->isOnline('success', '') ?>"> <?php echo $this->profile->isOnline(JText::_('COM_KUNENA_ONLINE'), JText::_('COM_KUNENA_OFFLINE')); ?> </span>
 		</div>
		
		<?php endif; ?>


			<?php // if (!empty($private)) : ?>
<!-- 				<a class="btn" href="<?php echo $private; ?>">
					<i class="icon-comments-2"></i>
					<?php echo $privateLabel ?>
				</a> -->
			<?php // endif; ?>
			<?php if ($email) : ?>
				<?php // TODO: Fix mailto link ?>
				<a class="uk-button" href="mailto:<?php echo $email; ?>"><i class="uk-icon-envelope-o"></i></a>
			<?php endif; ?>
			<?php if ($websiteURL) : ?>
				<a class="uk-button" href="<?php echo $websiteURL ?>"><i class="uk-icon-link"></i><?php echo $websiteName ?></a>
			<?php endif; ?>
	 

		<blockquote>
			<?php if ($signature) : ?>
				<b> <?php echo JText::_('COM_KUNENA_MYPROFILE_SIGNATURE'); ?> </b>
				<span><?php echo $signature; ?></span>
			<?php endif; ?>
		</blockquote>
		<blockquote>
			<?php if ($personalText) : ?>
				<b> <?php echo JText::_('COM_KUNENA_MYPROFILE_ABOUTME'); ?> </b>
				<span> <?php echo $personalText; ?> </span>
			<?php endif; ?>
		</blockquote>

			<div class="uk-panel uk-panel-box uk-float-left uk-margin">
			<ul class="uk-list">
				<li>
					<strong> <?php echo JText::_('COM_KUNENA_USERTYPE'); ?>:</strong>
					<span class="<?php echo $profile->getType(0, true); ?>"> <?php echo JText::_($profile->getType()); ?> </span>
				</li>
				<?php if ($banInfo && $banInfo->reason_public) : ?>
				<li>
					<strong> <?php echo JText::_('COM_KUNENA_MYPROFILE_BANINFO'); ?>:</strong>
					<span> <?php echo $this->escape($banInfo->reason_public); ?> </span>
				</li>
				<?php endif ?>
				<?php if ($this->config->showuserstats) : ?>
				<li>
					<strong> <?php echo JText::_('COM_KUNENA_MYPROFILE_RANK'); ?>:</strong>
						<span>
							<?php echo $this->escape($rankTitle); ?>
							<?php echo $rankImage; ?>
						</span>
					</li>
				<?php endif; ?>
			</ul>
			</div>

			<div class="uk-panel uk-panel-box uk-float-left uk-margin">
			<ul class="uk-list">
				<?php if ($this->config->userlist_joindate || $me->isModerator()) : ?>
					<li>
						<strong> <?php echo JText::_('COM_KUNENA_MYPROFILE_REGISTERDATE'); ?>:</strong>
						<span title="<?php echo $profile->getRegisterDate()->toKunena('ago'); ?>"> <?php echo $profile->getRegisterDate()->toKunena('date_today', 'utc'); ?> </span>
					</li>
				<?php endif; ?>
				<?php if ($this->config->userlist_lastvisitdate || $me->isModerator()) : ?>
					<li>
						<strong> <?php echo JText::_('COM_KUNENA_MYPROFILE_LASTVISITDATE'); ?>:</strong>
						<span title="<?php echo $profile->getLastVisitDate()->toKunena('ago'); ?>"> <?php echo $profile->getLastVisitDate()->toKunena('config_post_dateformat', 'ago'); ?> </span>
					</li>
				<?php endif; ?>
				<li>
					<strong> <?php echo JText::_('COM_KUNENA_MYPROFILE_TIMEZONE'); ?>:</strong>
					<span> UTC <?php echo $profile->getTime()->toTimezone(); ?> </span>
				</li>
				<li>
					<strong> <?php echo JText::_('COM_KUNENA_MYPROFILE_LOCAL_TIME'); ?>:</strong>
					<span> <?php echo $profile->getTime()->toKunena('time'); ?> </span>
				</li>
			</ul>
			</div>

			<div class="uk-panel uk-panel-box uk-float-left uk-margin">
			<ul class="uk-list">
				<li>
					<strong> <?php echo JText::_('COM_KUNENA_MESSAGES'); ?> </strong>
					<span> <?php echo JText::sprintf((int)$profile->posts); ?> </span>
				</li>
				<li>
					<strong> <?php echo JText::_('COM_KUNENA_PROFILE_VIEWS'); ?>:</strong>
					<span> <?php echo JText::sprintf((int)$profile->uhits); ?> </span>
				</li>
				<li>
					<strong> <?php echo JText::_('COM_KUNENA_THANK_YOU_RECIEVED'); ?>:</strong>
					<span> <?php echo JText::sprintf((int)$profile->thankyou); ?> </span>
				</li>
				<?php if (isset($profile->points)) : ?>
					<li>
						<strong> <?php echo JText::_('COM_KUNENA_AUP_POINTS'); ?> </strong>
						<span> <?php echo (int)$profile->points; ?> </span>
					</li>
				<?php endif; ?>
			</ul>
			</div>

			<div class="uk-panel uk-panel-box uk-float-left uk-margin">
			<ul class="uk-list">
				<li>
					<strong> <?php echo JText::_('COM_KUNENA_MYPROFILE_LOCATION') ?>:</strong>
				<span>
					<?php if ($profile->location) : ?>
						<a href="http://maps.google.com?q=<?php echo $this->escape($profile->location); ?>"
						   target="_blank"><?php echo $this->escape($profile->location); ?></a>
					<?php else : ?>
						<?php echo JText::_('COM_KUNENA_LOCATION_UNKNOWN'); ?>
					<?php endif; ?>
				</span>
				</li>
				<li>
					<strong> <?php echo JText::_('COM_KUNENA_MYPROFILE_GENDER'); ?>:</strong>
					<span> <?php echo $profile->getGender(); ?> </span>
				</li>
				<li>
					<strong> <?php echo JText::_('COM_KUNENA_MYPROFILE_BIRTHDATE'); ?>:</strong>
					<span> <?php echo KunenaDate::getInstance($profile->birthdate)->toSpan('date', 'ago', 'utc'); ?> </span>
				</li>
				<?php if (!empty($profile->medals)) : ?>
					<li>
						<strong> <?php echo JText::_('COM_KUNENA_AUP_MEDALS'); ?> </strong>
						<span> <?php echo implode(' ', $profile->medals); ?> </span>
					</li>
				<?php endif; ?>
			</ul>
			</div>
 
 

 

 
 
<div class="well uk-clearfix"> <?php echo $this->subLayout('User/Item/Social')->set('profile', $profile)->set('showAll', true); ?> </div>
 
 

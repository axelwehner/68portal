<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<div class="bannergroup<?php echo $params->get( 'moduleclass_sfx' ) ?>">

<?php if ($headerText) : ?>
	<p class="bannerheader"><?php echo $headerText ?></p>
<?php endif; ?>

<ul>
<?php
foreach($list as $item) :
?>
	<li class="banneritem<?php echo $params->get( 'moduleclass_sfx' ) ?>">
		<?php echo modBannersHelper::renderBanner($params, $item); ?>
	</li>
<?php endforeach; ?>
</ul>
<?php if ($footerText) : ?>
	<p class="bannerfooter<?php echo $params->get( 'moduleclass_sfx' ) ?>">
		 <?php echo $footerText ?>
	</p>
<?php endif; ?>
</div>
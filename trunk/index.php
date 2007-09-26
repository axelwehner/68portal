<?php
/**
* @version		$Id$
* @package		Joomla
* @subpackage	68portal
* @copyright	Copyright (c)2007 Axel Wehner. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
**/

defined( '_JEXEC' ) or die( 'Restricted access' );

// sitetitle
$sitetitle = $mainframe->getCfg('sitename');

// layout settings
if ($this->countModules('left and right')) :
	$layout = 'left-n-right-col';
elseif ($this->countModules('left')) :
	$layout = 'left-col';
elseif ($this->countModules('right')) :
	$layout = 'right-col';
else :
	$layout = 'no-col';
endif;

// opera css class
if (stristr($_SERVER['HTTP_USER_AGENT'],'opera')) :
	$browser = 'class="opera"';
else :
	$browser = '';
endif;

// content module settings
if ($this->countModules('user1 and user2')) :
	$module1 = 'float1';
	$module2 = 'float2';
elseif ($this->countModules('user1 or user2')) :
	$module1 = '';
	$module2 = '';
endif;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/system.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/layout.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template_css.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/navigation.css" type="text/css" />
  <!--[if IE]><link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/iefixes.css" type="text/css" /><![endif]-->
</head>

<body class="<?php echo $layout; ?> width_<?php echo $this->params->get('width'); ?>">

<!-- shadow left -->
<div id="page-l">

	<!-- shadow right -->
	<div id="page-r">

		<!-- top header -->
		<div id="top-header">
			<h1><a href="index.php"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.gif" alt="<?php echo $sitetitle; ?>" title="<?php echo $sitetitle; ?>" /></a></h1>
			<jdoc:include type="modules" name="user3" />
			<jdoc:include type="modules" name="user4" />
		</div>
		<!-- //top header -->

		<!-- header -->
		<div id="header">

			<div id="topmod" <?php if ($this->params->get('topmodule') == 'welcome') : ?>class="welcome"<?php endif; ?>>

				<?php if ($this->params->get('topmodule') == 'module') : ?>
				<jdoc:include type="modules" name="top" style="68portal_left" />
				<?php endif; ?>

				<?php if ($this->params->get('topmodule') == 'welcome') : ?>
				<div class="moduletable">
					<?php if ($this->params->get('welcomehead') != '') : ?>
	                <h3 class="welcome_heading">
						<?php echo $this->params->get('welcomehead'); ?>
					</h3>
					<?php endif;
					if ($this->params->get('welcometext') != '') : ?>
					<p class="welcome_text">
						<?php echo $this->params->get('welcometext'); ?>
					</p>
					<?php endif; ?>
				</div>
				<?php endif; ?>

			</div>

			<div id="image">
                <?php if ($this->params->get('slogan') != '') : ?>
				<h2 id="slogan">
					<?php echo $this->params->get('slogan'); ?>
				</h2>
				<?php endif; ?>
			</div>

		</div>
		<!-- //header -->

		<!-- content -->
		<div id="content">

			<?php if($this->countModules('left')) : ?>
			<!-- left sidebar -->
			<div id="left-sidebar">
				<jdoc:include type="modules" name="left" style="68portal_left" />
			</div>
			<!-- //left sidebar -->
			<?php endif; ?>

			<!-- main -->
			<div id="main">

                <!-- breadcrumbs -->
				<div id="breadcrumb" <?php echo $browser; ?>>
					<h3 class="here"><?php echo JText::_('You are here'); ?></h3>
					<jdoc:include type="module" name="breadcrumbs" />
				</div>
				<!-- //breadcrumbs -->

				<!-- main content -->
				<div id="main-content">

					<?php if($this->countModules('user1 or user2')) : ?>
					<!-- content modules -->
					<div class="content-modules">

						<?php if($this->countModules('user1')) : ?>
                        <div class="<?php echo $module1; ?>">
							<jdoc:include type="modules" name="user1" style="68portal" />
						</div>
						<?php endif; ?>

						<?php if($this->countModules('user2')) : ?>
                        <div class="<?php echo $module2; ?>">
                        	<jdoc:include type="modules" name="user2" style="68portal" />
						</div>
						<?php endif; ?>

					</div>
					<!-- //content modules -->
					<?php endif; ?>

					<!-- component -->
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<!-- //component -->

				</div>
				<!-- //main content -->

				<?php if($this->countModules('right')) : ?>
				<!-- right sidebar -->
				<div id="right-sidebar">
                    <jdoc:include type="modules" name="right" style="68portal" />
				</div>
				<!-- //right sidebar -->
				<?php endif; ?>

			</div>
			<!-- //main -->

			<?php if ($this->params->get('copyright') != '' || $this->params->get('poweredby') == 'show') : ?>
			<!-- footer -->
			<div id="ie_clearing"> </div>
			<div id="footer">
				<?php if ($this->params->get('copyright') != '') : ?>
				<p class="copyright">
					<?php echo $this->params->get('copyright'); ?>
				</p>
				<?php endif; ?>

				<?php if ($this->params->get('poweredby') == 'show') : ?>
				<p class="joomla">
					<?php echo JText::_('Powered by');?> <a href="http://www.joomla.org"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/joomla.gif" alt="Joomla! CMS" /></a>
				</p>
            	<?php endif; ?>
			</div>
			<!-- //footer -->
			<?php endif; ?>

		</div>
		<!-- //content -->

		<div id="page-b">&nbsp;</div>

	</div>
	<!-- //shadow right -->

</div>
<!-- //shadow left -->

<jdoc:include type="modules" name="debug" />

</body>
</html>
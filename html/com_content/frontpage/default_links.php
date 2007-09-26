<?php

/**
* @version      $Id$
* @package      Joomla!
* @subpackage   68portal
* @license      GNU/GPL
**/

defined( '_JEXEC' ) or die('Restricted access');
?>

<div class="readmore">
	<h3><?php echo JText::_( 'Read more...' ); ?></h3>
	<ul>
		<?php foreach ($this->links as $link) : ?>
		<li>
			<a class="blogsection" href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($link->slug, $link->catslug, $link->sectionid)); ?>">
				<?php echo $link->title; ?>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
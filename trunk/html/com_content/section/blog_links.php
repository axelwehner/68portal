<?php

/**
* @version      $Id$
* @package      Joomla!
* @subpackage   68portal
* @license      GNU/GPL
**/

defined( '_JEXEC' ) or die('Restricted access');
?>

<h3><?php echo JText::_( 'Read more...' ); ?></h3>
<ul>
<?php
 foreach ($this->links as $link) : ?>
	<li>
		<a class="blogsection" href="<?php echo JRoute::_('index.php?view=article&id='.$link->slug); ?>">
			<?php echo $link->title; ?>
		</a>
	</li>
<?php endforeach; ?>
</ul>
<?php

/**
* @version      $Id$
* @package      Joomla!
* @subpackage   68portal
* @license      GNU/GPL
**/

defined( '_JEXEC' ) or die('Restricted access');
?>

<ol class="search_results">
		<?php
		foreach( $this->results as $result ) : ?>
				<li class="result">
						<?php if ( $result->href ) :
							if ($result->browsernav == 1 ) : ?>
								<h4><a href="<?php echo JRoute::_($result->href); ?>" target="_blank">
							<?php else : ?>
								<h4><a href="<?php echo JRoute::_($result->href); ?>">
							<?php endif;

							echo $this->escape($result->title);

							if ( $result->href ) : ?>
								</a></h4>
							<?php endif;
							if ( $result->section ) : ?>
							<ul class="meta">
								<li class="category"><small><?php echo $this->escape($result->section); ?></small></li>
                                <?php if ( $this->params->get( 'show_date' )) : ?>
								<li class="createdate"><small><?php echo $result->created; ?></small></li>
								<?php endif; ?>
							</ul>
							<?php endif; ?>

						<?php endif; ?>
					<p class="result_text">
						<?php echo $result->text; ?>
					</p>
			</li>
		<?php endforeach; ?>
</ol>

<?php echo $this->pagination->getPagesLinks( ); ?>

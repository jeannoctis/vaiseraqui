<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);

?>
<nav class="navigation" data-aos="fade-up">
   <?php if ($pager->hasPrevious()) : ?>
      <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.first') ?>" class="prev more">
         <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 1L1 6.5L7 12" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            </path>
         </svg>
      </a>
   <?php endif ?>
   
   <?php foreach ($pager->links() as $link) : ?>
      <a href="<?= $link['uri'] ?>" class="<?= $link['active'] ? 'active' : '' ?>">
         <?= $link['title'] ?>
      </a>
   <?php endforeach ?>   

   <?php if ($pager->hasNext()) : ?>
      <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="next more">
         <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 12L7 6.5L1 1" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            </path>
         </svg>
      </a>
   <?php endif ?>
</nav>
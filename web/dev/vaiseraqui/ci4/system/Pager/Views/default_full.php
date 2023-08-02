<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);

?>
<div class="content">
   <?php if ($pager->hasPrevious()) : ?>
      <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.first') ?>" class="prev more">
         <svg width="14" height="25" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L2 12.5L12 23" stroke="#DEDEDE" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
         </svg>
      </a>
   <?php endif ?>

   <div class="pages">
      <?php foreach ($pager->links() as $link) : ?>
         <a href="<?= $link['uri'] ?>" class="<?= $link['active'] ? 'active' : '' ?>">
            <?= $link['title'] ?>
         </a>
      <?php endforeach ?>
   </div>

   <?php if ($pager->hasNext()) : ?>
      <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="next more">
         <svg width="14" height="25" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 23L12 12.5L2 2" stroke="#607380" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
         </svg>
      </a>
   <?php endif ?>

</div>
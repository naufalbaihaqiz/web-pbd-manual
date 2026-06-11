<?php $pager->setSurroundCount(2) ?>
<div class="mt-24 flex justify-center items-center gap-3">
    <?php if ($pager->hasPrevious()) : ?>
        <a href="<?= $pager->getPrevious() ?>" class="px-5 h-10 flex items-center justify-center border border-outline-variant text-secondary hover:border-primary hover:text-primary transition-colors rounded-sm font-label-md text-[11px] uppercase tracking-widest gap-1">
            <span class="material-symbols-outlined text-[14px]">chevron_left</span> Prev
        </a>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
        <?php if ($link['active']) : ?>
            <span class="w-10 h-10 flex items-center justify-center bg-[#7d7465] text-white rounded-sm font-label-md text-sm cursor-default">
                <?= $link['title'] ?>
            </span>
        <?php else : ?>
            <a href="<?= $link['uri'] ?>" class="w-10 h-10 flex items-center justify-center border border-outline-variant text-secondary hover:border-primary hover:text-primary transition-colors rounded-sm font-label-md text-sm">
                <?= $link['title'] ?>
            </a>
        <?php endif ?>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <a href="<?= $pager->getNext() ?>" class="px-5 h-10 flex items-center justify-center border border-outline-variant text-secondary hover:border-primary hover:text-primary transition-colors rounded-sm font-label-md text-[11px] uppercase tracking-widest gap-1">
            Next <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        </a>
    <?php endif ?>
</div>

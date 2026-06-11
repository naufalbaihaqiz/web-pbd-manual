<?php $pager->setSurroundCount(2) ?>
<div class="mt-16 flex justify-center items-center gap-3">
    <?php if ($pager->hasPrevious()) : ?>
        <a href="<?= $pager->getPrevious() ?>" class="w-8 h-8 flex items-center justify-center bg-transparent text-gray-500 hover:text-gray-900 text-[11px] font-bold transition-colors">
            <span class="material-symbols-outlined text-[13px]">chevron_left</span>
        </a>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
        <a href="<?= $link['uri'] ?>" class="w-8 h-8 flex items-center justify-center <?= $link['active'] ? 'bg-[#A68A64] text-white' : 'bg-transparent text-gray-500 hover:text-gray-900' ?> text-[11px] font-bold transition-colors">
            <?= $link['title'] ?>
        </a>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <a href="<?= $pager->getNext() ?>" class="px-4 py-1.5 flex items-center justify-center bg-transparent text-gray-500 hover:text-gray-900 text-[9px] font-bold tracking-widest border border-gray-200 hover:border-gray-300 ml-4 transition-colors">
            NEXT <span class="material-symbols-outlined text-[13px] ml-1.5">chevron_right</span>
        </a>
    <?php endif ?>
</div>

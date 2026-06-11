<!DOCTYPE html>
<html class="scroll-smooth" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>AkademikPro.id | Marketplace Jasa Akademik No.1 Indonesia</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script src="<?= base_url('js/tailwind-config.js') ?>"></script>
    
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="bg-background text-on-background font-body-md overflow-x-hidden min-h-screen flex flex-col">

    <?= $this->include('layout/navbar') ?>

    <div class="flex-grow flex flex-col">
        <?= $this->renderSection('content') ?>
    </div>

    <?= $this->include('layout/footer') ?>

    <?= $this->include('layout/auth_modal') ?>

    <?= $this->include('layout/search_modal') ?>

    <?= $this->renderSection('script') ?>
    
    <script src="<?= base_url('js/auth-modal.js') ?>"></script>
    <script src="<?= base_url('js/search-modal.js') ?>"></script>

</body>
</html>
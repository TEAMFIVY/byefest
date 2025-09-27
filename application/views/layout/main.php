<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Dashboard' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/tailwind.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="bg-slate-50">
    <div class="flex relative overflow-x-hidden min-h-screen">
        <?php $this->load->view('layout/sidebar'); ?>
        <div class="flex-1 flex flex-col min-h-screen ml-0 md:ml-72">
            <?php $this->load->view('layout/header'); ?>

            <main class="flex-1 p-8">
                <?= $contents ?>
            </main>
        </div>
    </div>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>

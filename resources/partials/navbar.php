<?php
  $selected_class = "bg-gray-900 text-white";
  $unselected_class = "text-gray-300 hover:bg-gray-700 hover:text-white";

  $options = [
    'home' => ['label' => 'Inicio', 'url' => '/'],
    'about' => ['label' => 'Acerca de', 'url' => '/about'],
    'links' => ['label' => 'Proyectos', 'url' => '/links']
  ];

  $current_path = $_SERVER['REQUEST_URI'];
?>

<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl flex h-16 items-center justify-center">
        <div class="flex gap-4">
          <?php foreach ($options as $key => $option): ?>
            <a href="<?= $option['url'] ?>" class="<?= ($current_path === $option['url']) ? $selected_class : $unselected_class; ?> rounded-md px-3 py-2 text-sm font-medium"><?= $option['label'] ?></a>
          <?php endforeach; ?>
        </div>
    </div>
</nav>
<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container0RwVlgG\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container0RwVlgG/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/Container0RwVlgG.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\Container0RwVlgG\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \Container0RwVlgG\srcDevDebugProjectContainer(array(
    'container.build_hash' => '0RwVlgG',
    'container.build_id' => '3fadff90',
    'container.build_time' => 1540530533,
), __DIR__.\DIRECTORY_SEPARATOR.'Container0RwVlgG');
<?php

// Available placeholders: :uc:vendor, :uc:package, :lc:vendor, :lc:package
return [
    'Config/mypackage.php' => 'Config/:lc:package.php',
    'src/Facades/MyPackage.php' => 'src/Facades/:uc:package.php',
    'src/Providers/MyPackageServiceProvider.php' => 'src/Providers/:uc:packageServiceProvider.php',
];

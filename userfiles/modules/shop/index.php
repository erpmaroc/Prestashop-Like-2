<?php
$controller = \Illuminate\Support\Facades\App::make(\depexorPackages\Shop\Http\Controllers\ShopController::class);

$request = new \Illuminate\Http\Request();
$request->merge($params);
$request->merge($_REQUEST);

$controller->setModuleParams($params);
$controller->setModuleConfig($config);
$controller->registerModule();

echo $controller->index($request);

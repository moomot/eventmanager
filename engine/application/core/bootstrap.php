<?php

// Load class loader
Loader::init();
Url::init();
Session::init();
// start route
try {
    Route::start();
} catch(PageNotFoundException $e) {
    header("Location: /404");
} catch(AccessForbiddenException $e) {
    header("Location: /403");
}



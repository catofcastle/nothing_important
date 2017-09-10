<?php

use core\Route;

require_once 'autoload.php';

spl_autoload_register('loadFromControllers');
spl_autoload_register('loadFromModels');
spl_autoload_register('loadFromCore');

Route::run();

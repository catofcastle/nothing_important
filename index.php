<?php

use core\Route;

require_once 'autoload.php';
require_once 'bootstrap.php';

spl_autoload_register('loadFromControllers');
spl_autoload_register('loadFromModels');
spl_autoload_register('loadFromCore');

Route::run();

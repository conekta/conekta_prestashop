<?php

require_once __DIR__ . '/../vendor/autoload.php';

// ========== Mocks ===========
require_once __DIR__ . '/mocks/ObjectModel.php';

// ======== Classes ===========
require_once __DIR__ . '/../classes/Advice.php';
require_once __DIR__ . '/../classes/GamificationTools.php';

if (!defined('_PS_VERSION_')) {
    define('_PS_VERSION_', 'TEST_VERSION');
}

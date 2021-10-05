<?php
defined('TYPO3_MODE') || die();

call_user_func(function() {
    unset($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-cached']['indexed_search']);
});

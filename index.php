<?php
session_start();

require_once __DIR__ . '/lib/File.php';
require_once File::build_path(array('Session','Session.php'));
require_once File::build_path(array('controller','Router.php'));
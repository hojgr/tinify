<?php
/**
 * Bootstraps for tests
 *
 * PHP version 5.6
 *
 * @category Tests
 * @package  None
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */


require __DIR__ . "/../src/Core/ClassLoader/ClassLoader.php";

$classLoader = new App\Core\ClassLoader\ClassLoader();
$classLoader->setBasePath(__DIR__ . "/../src/");
$classLoader->addSubstitution("^App", "");

spl_autoload_register([$classLoader, "loadClass"]);

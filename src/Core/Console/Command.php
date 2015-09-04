<?php
/**
 * Handles a command itself
 *
 * PHP version 5.6
 *
 * @category Console
 * @package  App\Core\Console
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */

namespace App\Core\Console;

/**
 * Class Command
 *
 * @category Console
 * @package  App\Core\Console
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */
abstract class Command
{
    /**
     * A string identifier identifying the command
     *
     * @var string $command
     */
    public $command = null;

    /**
     * Executes a command
     *
     * @return void
     */
    public function execute()
    {
        $this->run();

        return true;
    }
}

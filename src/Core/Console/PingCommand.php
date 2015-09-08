<?php
/**
 * A ping command
 *
 * PHP version 5.6
 *
 * @category Command
 * @package  App\Core\Console
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */

namespace App\Core\Console;

/**
 * Class PingCommand
 *
 * @category Command
 * @package  App\Core\Console
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */
class PingCommand extends Command
{
    public static $identifier = "ping";

    /**
     * Run command
     *
     * @return void
     */
    function run()
    {
        echo "Pong!\n";
    }
    
}

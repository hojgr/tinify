<?php
/**
 * A ping command
 *
 * PHP version 5.6
 *
 * @category Command
 * @package  App\Console
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */

namespace App\Console;

require __DIR__ . "/../Core/Console/Command.php";

use App\Core\Console\Command;

/**
 * Class PingCommand
 *
 * @category Command
 * @package  App\Console
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */
class PingCommand extends Command
{
    public static $identifier = "ping";

    function run()
    {
        echo "Pong!\n";
    }
    
}

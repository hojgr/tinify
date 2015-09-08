<?php
/**
 * A Tinify console
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
 * Class Console
 *
 * @category Console
 * @package  App\Core\Console
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */
class Console
{

    protected $knownCommands;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->knownCommands = [
            'App\Core\Console\PingCommand'
        ];
    }
    
    /**
     * Finds command by given name
     *
     * @param string $commandIdentifier Command
     *
     * @return Command
     */
    function findCommand($commandIdentifier)
    {
        foreach ($this->knownCommands as $cmd) {
            if ($cmd::$identifier == $commandIdentifier) {
                return new $cmd;
            }
        }

        throw new CommandNotFoundException(
            "Command `$commandIdentifier` was not found"
        );
    }
    
}

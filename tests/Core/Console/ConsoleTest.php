<?php
/**
 * Test file for Console class
 *
 * PHP version 5.6
 *
 * @category Test
 * @package  Tests\Core\Console
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */

require_once __DIR__ . "/../../../src/Core/Console/Console.php";
require_once __DIR__ . "/../../../src/Core/Console/CommandNotFoundException.php";

use App\Core\Console\Console;

/**
 * Class ConsoleTest
 *
 * @category Test
 * @package  Tests\Core\Console
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */
class ConsoleTest extends PHPUnit_Framework_TestCase
{

    /**
     * Tests findCommand method
     *
     * @return void
     */
    function testFindCommandWorks()
    {
        $console = new Console();

        $command = $console->findCommand("ping");

        $this->assertInstanceOf('App\Core\Console\Command', $command);
    }

    /**
     * Tests findCommand method
     *
     * Should throw exception when looking for nonexistent cmd
     *
     * @return void
     */
    function testFindCommandThrowsException()
    {
        $console = new Console();

        $this->setExpectedException('App\Core\Console\CommandNotFoundException');

        $console->findCommand("nonexistent-command-test");

    }

    /**
     * Tests console command "Ping."
     *
     * @return void
     */
    function testPingCommand()
    {
        $console = new Console();

        ob_start();

        $result = $console->findCommand("ping")->execute();

        $out = ob_get_clean();

        $this->assertTrue($result);
        $this->assertSame("Pong!\n", $out);
    }
        
}

<?php

namespace App\Commands;

use App\Models\Logic\UserLogic;
use Swoft\App;
use Swoft\Console\Bean\Annotation\Command;
use Swoft\Console\Bean\Annotation\Mapping;
use Swoft\Console\Input\Input;
use Swoft\Console\Output\Output;
use Swoft\Log\Log;

/**
 * the group of test command
 *
 * @Command()
 * @uses      TestCommand
 * @version   2017年11月03日
 * @author    stelin <phpcrazy@126.com>
 * @copyright Copyright 2010-2016 swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class TestCommand
{
    /**
     * this test command
     *
     * @Usage
     * test:{command} [arguments] [options]
     *
     * @Options
     * -o,--o this is command option
     *
     * @Arguments
     * arg this is argument
     *
     * @Example
     * php swoft test:test arg=stelin -o opt
     *
     * @param Input  $input
     * @param Output $output
     *
     * @Mapping("test2")
     */
    public function test(Input $input, Output $output)
    {
        var_dump('test', $input, $output);
    }

    /**
     * this demo command
     *
     * @Usage
     * test:{command} [arguments] [options]
     *
     * @Options
     * -o,--o this is command option
     *
     * @Arguments
     * arg this is argument
     *
     * @Example
     * php swoft test:demo arg=stelin -o opt
     *
     * @Mapping()
     */
    public function demo()
    {
        $hasOpt = input()->hasOpt('o');
        $opt    = input()->getOpt('o');
        $name   = input()->getArg('arg', 'swoft');

        App::trace('this is command log');
        Log::info('this is comamnd info log');
        /* @var UserLogic $logic */
        $logic = App::getBean(UserLogic::class);
        $data  = $logic->getUserInfo(['uid1']);
        var_dump($hasOpt, $opt, $name, $data);
    }
}
<?php
/*
 * This file is part of Dispatcher.
 *
 * (c) Halimon Alexander <vvthanatos@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace HalimonAlexander\Dispatcher;

abstract class Listener
{
    abstract function __construct();
    abstract function __invoke();
}

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

class Dispatcher implements IDispatcher
{
    private $listeners = array();

    public function addListener(string $eventName, callable $listener)
    {
        $this->listeners[$eventName][] = $listener;
    }

    public function dispatch(string $eventName, Event $event)
    {
        if ($this->hasListeners($eventName)) {
            $listeners = $this->getListeners($eventName);

            foreach ($listeners as $listener) {
                call_user_func($listener, $event, $eventName);
            }
        }
    }

    public function getListeners(string $eventName): array
    {
        if (!array_key_exists($eventName, $this->listeners)) {
            return [];
        }

        return $this->listeners[$eventName];
    }

    public function hasListeners(string $eventName): bool
    {
        return !empty($this->getListeners($eventName));
    }
}

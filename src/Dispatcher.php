<?php

/*
 * This file is part of Dispatcher.
 *
 * (c) Halimon Alexander <a@halimon.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace HalimonAlexander\Dispatcher;

class Dispatcher implements DispatcherInterface
{
    /**
     * @var callable[][]
     */
    private array $listeners = [];

    /**
     * @inheritdoc
     */
    public function addListener(string $eventName, callable $listener): void
    {
        $this->listeners[$eventName][] = $listener;
    }

    /**
     * @inheritdoc
     */
    public function dispatch(string $eventName, Event $event): void
    {
        if ($this->hasListeners($eventName)) {
            $listeners = $this->getListeners($eventName);

            foreach ($listeners as $listener) {
                $listener($event, $eventName);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function getListeners(string $eventName): array
    {
        if (!array_key_exists($eventName, $this->listeners)) {
            return [];
        }

        return $this->listeners[$eventName];
    }

    /**
     * @inheritdoc
     */
    public function hasListeners(string $eventName): bool
    {
        return !empty($this->getListeners($eventName));
    }
}

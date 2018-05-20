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

interface IDispatcher
{
    /**
     * Dispatches an event to all registered listeners.
     *
     * @param string $eventName The name of the event to dispatch. The name of  the event is the name of the method that is invoked on listeners.
     * @param Event  $event     The event to pass to the event handlers/listeners.
     */
    public function dispatch(string $eventName, Event $event);

    /**
     * Adds an event listener that listens on the specified events.
     *
     * @param string   $eventName The event to listen on
     * @param callable $listener  The listener
     */
    public function addListener(string $eventName, callable $listener);

    /**
     * Gets the listeners of a specific event sorted by descending priority.
     *
     * @param string $eventName The name of the event
     *
     * @return array The event listeners for the specified event
     */
    public function getListeners(string $eventName): array;

    /**
     * Checks whether an event has any registered listeners.
     *
     * @param string $eventName The name of the event
     *
     * @return bool true if the specified event has any listeners, false otherwise
     */
    public function hasListeners(string $eventName):bool;
}

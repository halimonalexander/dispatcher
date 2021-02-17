# Dispatcher

Events dispatcher Library

![main branch parameter](https://github.com/halimonalexander/dispatcher/workflows/php/badge.svg)


## Install
```bash
$ composer require halimonalexander/dispatcher
```

## Example of usage

```php
use HalimonAlexander\Dispatcher\Dispatcher;
use HalimonAlexander\Dispatcher\Event;
use HalimonAlexander\Dispatcher\Listener;

class FooBarEvent extends Event
{
    public const EVENT_NAME = 'FooBar';
    
    public function foo(): void
    {
        //...
    }
    
    public function bar(): void
    {
        //...
    }
}

class FooListener extends Listener
{
    public function __invoke(Event $event) : void
    {
        if ($event instanceof FooBarEvent) {
            $event->foo();
        }
    }
}

class BarListener extends Listener
{
    public function __invoke(Event $event) : void
    {
        if ($event instanceof FooBarEvent) {
            $event->bar();
        }
    }
}

$dispatcher = new Dispatcher();
$dispatcher->addListener(FooBarEvent::EVENT_NAME, new FooListener());
$dispatcher->addListener(FooBarEvent::EVENT_NAME, new BarListener());
// ...
$dispatcher->dispatch(FooBarEvent::EVENT_NAME, new FooBarEvent());
```
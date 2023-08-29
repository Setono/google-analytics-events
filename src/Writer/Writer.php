<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Writer;

use Setono\GoogleAnalyticsEvents\Event\Event;
use Setono\GoogleAnalyticsEvents\Exception\WriterException;

interface Writer
{
    /**
     * Takes an event as input and returns the javascript output
     *
     * @throws WriterException if it's not possible to convert the event
     */
    public function write(Event $event): string;
}

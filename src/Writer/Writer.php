<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Writer;

use Setono\GoogleAnalyticsEvents\Event\GenericEvent;
use Setono\GoogleAnalyticsEvents\Exception\WriterException;

interface Writer
{
    /**
     * @throws WriterException if it's not possible to convert the event to a string
     */
    public function write(GenericEvent $event): string;
}

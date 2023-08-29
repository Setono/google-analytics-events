<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Writer;

use Setono\GoogleAnalyticsEvents\Event\GenericEvent;
use Setono\GoogleAnalyticsEvents\Exception\WriterException;

final class GtagWriter implements Writer
{
    public function write(GenericEvent $event): string
    {
        try {
            $json = json_encode($event->getParameters(), \JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw WriterException::fromJsonException($e);
        }

        return sprintf('gtag("event", "%s", %s);', $event::getName(), $json);
    }
}

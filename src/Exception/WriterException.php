<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Exception;

final class WriterException extends \RuntimeException
{
    public static function fromJsonException(\JsonException $jsonException): self
    {
        return new self(sprintf(
            'An error occurred when trying to json encode the event parameters: %s',
            $jsonException->getMessage()
        ), 0, $jsonException);
    }
}

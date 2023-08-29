<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Traits\HasSessionId;

// todo add validate method
abstract class Event implements ParametersAware
{
    use HasSessionId;

    /**
     * MUST return the event name, e.g. add_to_cart, purchase, etc.
     *
     * See https://developers.google.com/analytics/devguides/collection/ga4/reference/events for an event reference
     */
    abstract public static function getName(): string;

    /**
     * Maps the Google Analytics parameter names to a local variable
     *
     * @return array<string, mixed>
     */
    abstract protected function getParameterMapping(): array;

    public function getParameters(): array
    {
        return self::resolveArray($this->getParameterMapping());
    }

    private static function resolveArray(array $values): array
    {
        $arr = [];

        /** @var mixed $value */
        foreach ($values as $key => $value) {
            if (is_scalar($value)) {
                $arr[$key] = $value;
            } elseif ($value instanceof ParametersAware) {
                $arr[$key] = self::resolveArray($value->getParameters());
            } elseif (is_array($value)) {
                $arr[$key] = self::resolveArray($value);
            }
        }

        return $arr;
    }
}

<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Traits\HasCustomParameters;

abstract class GenericEvent implements Event
{
    use HasCustomParameters;

    /**
     * Maps the Google Analytics parameter names to a local variable
     *
     * @return array<string, mixed>
     */
    abstract protected function getParameterMapping(): array;

    public function getParameters(): array
    {
        $parameters = $this->getParameterMapping();

        return self::resolveArray(array_merge(
            $parameters,
            array_filter($this->getCustomParameters())
        ));
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

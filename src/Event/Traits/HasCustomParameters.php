<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event\Traits;

trait HasCustomParameters
{
    /** @var array<string, mixed> */
    protected array $customParameters = [];

    /**
     * @return array<string, mixed>
     */
    public function getCustomParameters(): array
    {
        return $this->customParameters;
    }

    /**
     * @param array<string, mixed> $customParameters
     *
     * @return static
     */
    public function setCustomParameters(array $customParameters): self
    {
        $this->customParameters = $customParameters;

        return $this;
    }

    /**
     * @return mixed
     *
     * @throws \InvalidArgumentException if the $customParameter is not set
     */
    public function getCustomParameter(string $customParameter)
    {
        if (!$this->hasCustomParameter($customParameter)) {
            throw new \InvalidArgumentException(sprintf('The item does not have the custom parameter "%s"', $customParameter));
        }

        return $this->customParameters[$customParameter];
    }

    /**
     * @param mixed $value
     *
     * @return static
     */
    public function setCustomParameter(string $customParameter, $value): self
    {
        $this->customParameters[$customParameter] = $value;

        return $this;
    }

    /**
     * @psalm-assert-if-true mixed $this->customerParameters[$customParameter]
     */
    public function hasCustomParameter(string $customParameter): bool
    {
        return array_key_exists($customParameter, $this->customParameters);
    }
}

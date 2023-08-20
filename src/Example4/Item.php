<?php

declare(strict_types=1);

namespace Idealista\PropertyBasedTestingWorkshop\Example4;

final readonly class Item
{
    public function __construct(
        public string $name,
        public int $sellIn,
        public int $quality,
    )
    {
    }

    public function with(
        string $name = null,
        int $sellIn = null,
        int $quality = null,
    ): self
    {
        return new self(
            $name ?? $this->name,
            $sellIn ?? $this->sellIn,
            $quality ?? $this->quality,
        );
    }
}

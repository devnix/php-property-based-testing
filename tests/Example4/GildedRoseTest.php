<?php

declare(strict_types=1);

namespace Idealista\PropertyBasedTestingWorkshop\Tests\Example4;

use Idealista\PropertyBasedTestingWorkshop\Example4\GildedRose;
use Innmind\BlackBox\PHPUnit\BlackBox;
use Innmind\BlackBox\Set;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(GildedRose::class)]
final class GildedRoseTest extends Framework\TestCase
{
    use BlackBox;

    private Set\Value $sulfuras;

    private Set\Value $brie;

    private Set\Value $backstagePass;

    private Set $generic;

    public function setUp(): void
    {
        $this->sulfuras = Set\Value::immutable(GildedRose::NAME_SULFURAS);
        $this->brie = Set\Value::immutable(GildedRose::NAME_BRIE);
        $this->backstagePass = Set\Value::immutable(GildedRose::NAME_BACKSTAGE_PASS);
        $this->generic = Set\Strings::any();
    }


}

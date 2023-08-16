<?php

declare(strict_types=1);

namespace Idealista\PropertyBasedTestingWorkshop\Tests;

use Innmind\BlackBox\PHPUnit\BlackBox;
use Innmind\BlackBox\Set;
use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\TestCase;

use function Idealista\PropertyBasedTestingWorkshop\add;

#[CoversFunction('Idealista\PropertyBasedTestingWorkshop\add')]
final class AddTest extends TestCase
{
    use BlackBox;

    public function testIsCommutative(): void
    {

        $this
            ->forAll(
                Set\Integers::any(),
                Set\Integers::any(),
            )
            ->then(function (int $a, int $b) {
                self::assertSame(
                    add($a, $b),
                    add($b, $a),
                );
            })
        ;
    }
}

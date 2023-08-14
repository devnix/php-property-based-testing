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

    public function testAddIsCommutative(): void
    {
        $nonOverflowIntRange = Set\Integers::between(
            (int) (PHP_INT_MIN / 2) + 1, // @phpstan-ignore-line
            (int) (PHP_INT_MAX / 2) - 1
        );

        $this->forAll(
            $nonOverflowIntRange,
            $nonOverflowIntRange,
        )->then(function (int $a, int $b) {
            self::assertSame(
                add($a, $b),
                add($b, $a),
            );
        });
    }
}

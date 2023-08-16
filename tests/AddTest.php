<?php

declare(strict_types=1);

namespace Idealista\PropertyBasedTestingWorkshop\Tests;

use Innmind\BlackBox\PHPUnit\BlackBox;
use Innmind\BlackBox\Set;
use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\TestCase;

use function Idealista\PropertyBasedTestingWorkshop\add;
use function Psl\Type\numeric_string;

#[CoversFunction('Idealista\PropertyBasedTestingWorkshop\add')]
final class AddTest extends TestCase
{
    use BlackBox;

    public function test_is_commutative(): void
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
            });
    }

    public function test_is_associative(): void
    {
        $this
            ->forAll(
                Set\Integers::any(),
                Set\Integers::any(),
                Set\Integers::any(),
            )
            ->then(function (int $a, int $b, int $c) {
                self::assertSame(
                    add(add($a, $b), $c),
                    add($a, add($b, $c)),
                );
            });
    }

    public function test_is_identity(): void
    {
        $this
            ->forAll(Set\Integers::any())
            ->then(function (int $a) {
                self::assertSame(
                    numeric_string()->coerce($a),
                    add($a, 0)
                );
            });
    }
}

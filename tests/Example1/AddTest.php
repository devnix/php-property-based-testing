<?php

declare(strict_types=1);

namespace Idealista\PropertyBasedTestingWorkshop\Tests\Example1;

use Innmind\BlackBox\PHPUnit\BlackBox;
use Innmind\BlackBox\Set;
use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\TestCase;
use Psl\Type;

use function Idealista\PropertyBasedTestingWorkshop\Example1\add;

#[CoversFunction('Idealista\PropertyBasedTestingWorkshop\Example1\add')]
final class AddTest extends TestCase
{
    use BlackBox;

    public function test_is_commutative(): void
    {
        self::forAll(
            Set\Integers::any(),
            Set\Integers::any(),
        )->then(static function (int $a, int $b) {
            self::assertSame(
                add($a, $b),
                add($b, $a),
            );
        });
    }

    public function test_is_associative(): void
    {
        self::forAll(
            Set\Integers::any(),
            Set\Integers::any(),
            Set\Integers::any(),
        )->then(static function (int $a, int $b, int $c) {
            self::assertSame(
                add(add($a, $b), $c),
                add($a, add($b, $c)),
            );
        });
    }

    public function test_is_identity(): void
    {
        self::forAll(Set\Integers::any())
            ->then(static function (int $a) {
                self::assertSame(
                    Type\numeric_string()->coerce($a),
                    add($a, 0)
                );
            });
    }
}

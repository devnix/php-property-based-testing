<?php

declare(strict_types=1);

namespace Idealista\PropertyBasedTestingWorkshop\Tests\Example3;

use Innmind\BlackBox\PHPUnit\BlackBox;
use Innmind\BlackBox\Set;
use PHPUnit\Framework;

use function Idealista\PropertyBasedTestingWorkshop\Example3\division;

#[Framework\Attributes\CoversFunction('Idealista\PropertyBasedTestingWorkshop\Example3\division')]
final class DivisionTest extends Framework\TestCase
{
    use BlackBox;

    public function test_dividing_a_number_by_1_returns_itself(): void
    {
        self::forAll(Set\Integers::any())
            ->then(static function (int $a) {
                self::assertSame($a, division($a, 1));
            });
    }

    public function test_dividing_any_non_zero_number_by_itself_returns_1(): void
    {
        self::forAll(
            Set\Integers::any()
                ->filter(static fn (int $value) => 0 !== $value)
        )->then(static function (int $a) {
            self::assertSame(1, division($a, $a));
        });
    }

    public function test_multiplying_two_numbers_returns_a_negative_number_if_one_of_them_is_negative(): void
    {
        $test = static function (int $a, int $b) {
            self::assertTrue($a * $b < 0);
        };

        self::forAll(
            Set\Integers::between(-100, -1),
            Set\Integers::between(1, 100),
        )->then($test);

        self::forAll(
            Set\Integers::between(1, 100),
            Set\Integers::between(-100, -1),
        )->then($test);
    }
}

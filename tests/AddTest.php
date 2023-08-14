<?php

declare(strict_types=1);

namespace Idealista\PropertyBasedTestingWorkshop\Tests;

use Innmind\BlackBox\PHPUnit\BlackBox;
use Innmind\BlackBox\Set;
use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

use function Idealista\PropertyBasedTestingWorkshop\add;

#[CoversFunction('Idealista\PropertyBasedTestingWorkshop\add')]
final class AddTest extends TestCase
{
    use BlackBox;

    #[Test]
    public function add_is_commutative(): void
    {
        $nonOverflowableIntRange = Set\Integers::between((int)( PHP_INT_MIN / 2) - 1, (int)(PHP_INT_MAX / 2) - 1);

        $this->forAll(
            $nonOverflowableIntRange,
            $nonOverflowableIntRange,
        )->then(function (int $a, int $b) {
            $this->assertSame(
                add($a, $b),
                add($b, $a),
            );
        });
    }
}

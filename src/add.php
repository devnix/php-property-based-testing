<?php

declare(strict_types=1);

namespace Idealista\PropertyBasedTestingWorkshop;

function add(int $a, int $b): string
{
    return bcadd((string) $a, (string) $b);
}

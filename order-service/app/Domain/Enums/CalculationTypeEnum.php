<?php

namespace App\Domain\Order\Enums;

enum CalculationTypeEnum: string
{
    case WITH_TAX = 'with_tax';
    case WITHOUT_TAX = 'without_tax';
}

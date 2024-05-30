<?php

namespace App\Enums;

/**
 * Class Role
 * @package App\Enums
 */
enum Role: int
{
    case SuperAdministrator = 1;
    case InventoryManager = 2;
    case HumanResourceManager = 3;
    case MarketingManager = 4;
    case CustomerServiceReprentative = 5;
    case Customer = 6;

    /**
     * @param int $value
     * @return self|null
     */


    public static function fromValue(int $value): ?self
    {
        return match ($value) {
            1 => self::SuperAdministrator,
            2 => self::InventoryManager,
            3 => self::HumanResourceManager,
            4 => self::MarketingManager,
            5 => self::CustomerServiceReprentative,
            6 => self::Customer,
            default => null,
        };
    }

    /**
     * @param string $key
     * @return self|null
     */
    
    public static function fromKey(string $key): ?self
    {
        return match ($key) {
            'SuperAdministrator' => self::SuperAdministrator,
            'InventoryManager' => self::InventoryManager,
            'HumanResourceManager' => self::HumanResourceManager,
            'MarketingManager' => self::MarketingManager,
            'CustomerServiceReprentative' => self::CustomerServiceReprentative,
            'Customer' => self::Customer,
            default => null,
        };
    }
}

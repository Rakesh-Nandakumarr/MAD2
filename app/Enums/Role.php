<?php
namespace App\Enums;

enum Role: int
{
    case SuperAdministrator = 1;
    case InventoryManager = 2;
    case MarketingManager = 3;
    case SalesManager = 4;
    case FinanceManager = 5;
    case Customer = 6;
}

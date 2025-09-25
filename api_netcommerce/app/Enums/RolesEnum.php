<?php

namespace App\Enums;

enum RolesEnum: string
{
    case JR_DEV = 'Jr_Dev';
    case MID_DEV = 'Mid_Dev';
    case SR_DEV = 'Sr_Dev';
    case PM = 'PM';
    case ANALYST = 'Analyst';
    case MANAGER = 'Manager';
    case CEO = 'CEO';

    public function label(): string
    {
        return match($this) {
            self::JR_DEV => 'Jr Developer',
            self::MID_DEV => 'Mid Developer',
            self::SR_DEV => 'Sr Developer',
            self::PM => 'Project Manager',
            self::ANALYST => 'Analyst',
            self::MANAGER => 'Manager',
            self::CEO => 'CEO',
        };
    }
}
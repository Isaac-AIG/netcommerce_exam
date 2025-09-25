<?php

namespace App\Enums;

enum StatusEnum: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_Progress';
    case DELAYED = 'delayed';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match($this) {
            self::PENDING => 'Pending',
            self::IN_PROGRESS => 'In Progress',
            self::DELAYED => 'Delayed',
            self::COMPLETED => 'Completed',
        };
    }
}
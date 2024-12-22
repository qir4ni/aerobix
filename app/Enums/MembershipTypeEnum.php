<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
 
enum MembershipTypeEnum: string implements HasLabel
{
    case Basic = 'basic';
    case Premium = 'premium';
    
    public function getLabel(): ?string
    {
        // return $this->name;
    
        return match ($this) {
            self::Basic => 'Basic',
            self::Premium => 'Premium'
        };
    }
}
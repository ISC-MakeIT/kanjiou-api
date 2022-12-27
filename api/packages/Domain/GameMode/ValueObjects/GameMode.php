<?php

namespace Packages\Domain\GameMode\ValueObjects;

enum GameMode: string {
    case ONE_DOG_AMOUNG_SHEEP = '羊の中に犬が一匹';

    public function ofJa(): string {
        return $this->value;
    }

    public function ofEn(): string {
        return match ($this) {
            GameMode::ONE_DOG_AMOUNG_SHEEP => 'oneDogAmoungSheep'
        };
    }

    public function toParams(): string {
        return '&gameMode=' . $this->ofJa();
    }

    public static function elseDefaultOldestGameModeValue($value): GameMode {
        return GameMode::tryFrom($value) ?? GameMode::ONE_DOG_AMOUNG_SHEEP;
    }
}

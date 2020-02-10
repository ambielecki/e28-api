<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    public const STYLE_BOCK = 'bock';
    public const STYLE_BROWN_ALE = 'brown_ale';
    public const STYLE_DARK_ALE = 'dark_ale';
    public const STYLE_DARK_LAGER = 'dark_lager';
    public const STYLE_IPA = 'ipa';
    public const STYLE_PALE_ALE = 'pale_ale';
    public const STYLE_PILSNER = 'pilsner';
    public const STYLE_PORTER = 'porter';
    public const STYLE_SOUR = 'sour';
    public const STYLE_STOUT = 'stout';
    public const STYLE_WHEAT = 'wheat';

    public const STYLES = [
        self::STYLE_BOCK => 'Bock',
        self::STYLE_BROWN_ALE => 'Brown Ale',
        self::STYLE_DARK_ALE => 'Dark Ale',
        self::STYLE_DARK_LAGER => 'Dark Lager',
        self::STYLE_IPA => 'India Pale Ale (IPA)',
        self::STYLE_PALE_ALE => 'Pale Ale',
        self::STYLE_PILSNER => 'Pilsner',
        self::STYLE_PORTER => 'Porter',
        self::STYLE_SOUR => 'Sour',
        self::STYLE_STOUT => 'Stout',
        self::STYLE_WHEAT => 'Wheat',
    ];
}

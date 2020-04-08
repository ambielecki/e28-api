<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use JWTAuth;

class Beer extends ApiModel
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
        self::STYLE_IPA => 'IPA',
        self::STYLE_PALE_ALE => 'Pale Ale',
        self::STYLE_PILSNER => 'Pilsner',
        self::STYLE_PORTER => 'Porter',
        self::STYLE_SOUR => 'Sour',
        self::STYLE_STOUT => 'Stout',
        self::STYLE_WHEAT => 'Wheat',
    ];

    protected $guarded = ['id', 'user_id'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    protected function addSearch(Request $request, Builder $query): Builder {
        $search = "%{$request->input('search')}%";

        $query = $query->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', $search)
                ->orWhere('style', 'LIKE', $search);
        });


        return $query;
    }

    protected function addAuthorization(Request $request, Builder $query): Builder {
        $user = JWTAuth::getToken() ? JWTAuth::parseToken()->toUser() : null;

        if ($user) {
            $all_beers = $request->input('all_beers');

            if ($all_beers === 'true') {
                $query = $query->where(function ($query) use ($user) {
                    $query->where('user_id', $user->id)
                        ->orWhere('is_public', 1);
                });
            } else {
                $query = $query->where('user_id', $user->id);
            }

            return $query;
        }

        return $query->where('is_public', 1);
    }
}

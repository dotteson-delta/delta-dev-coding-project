<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteAttorney extends Model
{
    protected $table = 'attorney_favorites';
    public $timestamps = false;
}

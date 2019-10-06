<?php

namespace App;

use App\PortfolioImage;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'place',
        'banner',
        'date',
    ];

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }
}

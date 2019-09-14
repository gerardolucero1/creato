<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    protected $fillable = [
        'portfolio_id',
        'file_name',
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}

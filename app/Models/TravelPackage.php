<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'location', 'about', 
        'featured_event', 'language', 'foods', 'departure_date',
        'duration', 'type', 'price'
    ];

    protected $hidden = [
        'slug'
    ];

    public function galleries(){
        return $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'travel_packages_id', 'id');
    }

    public function getDepartureDateAttribute( $value ) {
        return Carbon::parse($value)->format('d M Y');
    }
}

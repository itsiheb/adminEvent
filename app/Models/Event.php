<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Category;
use App\Models\Location;

class Event extends Model
{
    protected $fillable = ['title','member_id','description','category_id','nbr_place','location_id'];
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}

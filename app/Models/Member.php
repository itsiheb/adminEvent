<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class Member extends Model
{
    protected $fillable = ['name','surname','email'];
    use HasFactory;


    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
    
}

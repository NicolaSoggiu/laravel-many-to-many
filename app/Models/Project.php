<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getRouteKey() {
        return $this->slug;
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }

    // public function slugger() {

    //     $baseSlug = Str::slug($string);
    //     $i = 1;
    //     $slug = $baseSlug;

    //     while (self::where("slug", $slug)->first()) {
    //         $slug = $baseSlug . "-" . $i;
    //         $i++;
    //     }


    //     return $slug;
    // }
}
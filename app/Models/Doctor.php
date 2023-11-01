<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Relations\MorphOne;




class Doctor extends Model
{
    use HasFactory;
    use Translatable; // 2. To add translation methods
    protected $fillable= ['email','email_verified_at','password','phone','price','name','appointments'];

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name','appointments'];

    /**
     * Get the Doctor's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}

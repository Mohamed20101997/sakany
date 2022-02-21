<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $fillable = ['about','address','phone','email','social_links','term_condition','privacy','site_name','logo','icon','description','property_rights'];

    protected $appends = ['image_path','icon_path'];


    public function getImagePathAttribute(){

        return Storage::url('images/'. $this->logo);

    } // end of getImagePathAttribute

    public function getIconPathAttribute(){

        return Storage::url('images/'. $this->icon);

    } // end of getImagePathAttribute

}

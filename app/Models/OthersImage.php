<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OthersImage extends Model
{
    use HasFactory;

    private static $othersImage, $image, $imageName, $directory;

    public static function imageUpload($otherImage){
        self::$image = $otherImage;
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'uploads/product-other-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory . self::$imageName;
    }


    public static function newOtherImage($otherImages, $id){
        foreach($otherImages as $otherImage){
            self::$othersImage = new OthersImage();
            self::$othersImage->product_id = $id;
            self::$othersImage->image = self::imageUpload($otherImage);
            self::$othersImage->save();
        }
    }
}

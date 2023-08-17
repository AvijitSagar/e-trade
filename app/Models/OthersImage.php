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

    public static function updateOtherImage($request, $id){
        self::$othersImage = OthersImage::where('product_id', $id)->get();
        foreach(self::$othersImage as $otherImage){
            if(file_exists($otherImage->image)){
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }
        self::newOtherImage($request->file('others_image'), $id);
    }

    public static function deleteOtherImage($id){
        self::$othersImage = OthersImage::where('product_id', $id)->get();
        foreach(self::$othersImage as $otherImage){
            if(file_exists($otherImage->image)){
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }
    }
}

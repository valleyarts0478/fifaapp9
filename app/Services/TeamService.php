<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use InterventionImage;

class TeamService
{
    public static function logoupload($imageFile, $folderName)
    {

        $fileName = uniqid(rand() . '_');
        $extension = $imageFile->extension();
        $fileNameToStore = $fileName . '.' . $extension;
        $resizedImage = InterventionImage::make($imageFile)->resize(500, 500)->encode();
        Storage::put('public/' . $folderName . '/' . $fileNameToStore, $resizedImage);


        return $fileNameToStore;
    }
}

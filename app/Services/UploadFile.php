<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class UploadFile
{
    public static function uploadFile($file, $path)
    {
        $fileName = time() .'.'.$file->getClientOriginalExtension();
        $filePath = $file->storeAs($path, $fileName);
        return $filePath;
    }

    public static function deleteFile($path)
    {
        if (Storage::exists($path))
            Storage::delete($path);
        else
            return false;
        return true;
    }
    public static function updateFile($path, $file, $new_path){
        if(self::deleteFile($path)){
            $filePath = self::uploadFile($file,$new_path);
            return $filePath;
        }
        else return 0;
    }
}

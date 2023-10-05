<?php
namespace App\Helpers;

class FileHelper
{
    public static function storeImage($request, $destinationFolder)
    {
        if ($request->hasFile('avatar')) {
            $imageName = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs($destinationFolder, $imageName);
            return $imageName; 
        }
        return null;
        
    }
}
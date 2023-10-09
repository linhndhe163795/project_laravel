<?php
namespace App\Helpers;

class FileHelper
{
    public static function storeImage($request, $destinationFolder)
    {
        if ($request->hasFile('avatar_image')) {
            $imageName = $request->file('avatar_image')->getClientOriginalName();
            $request->file('avatar_image')->storeAs($destinationFolder, $imageName);
            return $imageName; 
        }
        return null;
        
    }
}
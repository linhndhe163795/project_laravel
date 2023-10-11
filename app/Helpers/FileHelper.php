<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Mail;

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
    public static function SendMailToUser($request,$email){

        Mail::to($email)->send(new \App\Mail\SendMail(
            [
                'emails' => $email
            ],
            [
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name']
            ]
        ));
    }
}
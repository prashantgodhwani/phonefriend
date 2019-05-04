<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Phone;
use App\Repair;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;

class ResizeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware(['isBanned']);

    }
    public function index()
    {
		//Maximize script execution time
ini_set('max_execution_time', 50000);

//Initial settings, Just specify Source and Destination Image folder.
$ImagesDirectory	= '/home/155986.cloudwaysapps.com/mxejbwhetu/public_html/public/storage/photos/'; //Source Image Directory End with Slash
$DestImagesDirectory	= '/home/155986.cloudwaysapps.com/mxejbwhetu/public_html/public/storage/thumbs/'; //Destination Image Directory End with Slash
$NewImageWidth 		= 500; //New Width of Image
$NewImageHeight 	= 500; // New Height of Image
$Quality 		= 80; //Image Quality

//Open Source Image directory, loop through each Image and resize it.
if($dir = opendir($ImagesDirectory)){
	while(($file = readdir($dir))!== false){

		$imagePath = $ImagesDirectory.$file;
		$destPath = $DestImagesDirectory.$file;
		$checkValidImage = @getimagesize($imagePath);

		if(file_exists($imagePath) && $checkValidImage) //Continue only if 2 given parameters are true
		{
			//Image looks valid, resize.
			if($this->resizeImage($imagePath,$destPath,$NewImageWidth,$NewImageHeight,$Quality))
			{
				echo $file.' resize Success!<br />';
				/*
				Now Image is resized, may be save information in database?
				*/

			}else{
				echo $file.' resize Failed!<br />';
			}
		}
	}
	closedir($dir);
}


	}
	
	
	public function resizeImage($SrcImage,$DestImage, $MaxWidth,$MaxHeight,$Quality)
{
   	list($iWidth,$iHeight,$type)	= getimagesize($SrcImage);
    $ImageScale          	= min($MaxWidth/$iWidth, $MaxHeight/$iHeight);
    $NewWidth              	= ceil($ImageScale*$iWidth);
    $NewHeight             	= ceil($ImageScale*$iHeight);
    $NewCanves             	= imagecreatetruecolor($NewWidth, $NewHeight);

	switch(strtolower(image_type_to_mime_type($type)))
	{
		case 'image/jpeg':
			$NewImage = imagecreatefromjpeg($SrcImage);
			break;
		case 'image/png':
			$NewImage = imagecreatefrompng($SrcImage);
			break;
		case 'image/gif':
			$NewImage = imagecreatefromgif($SrcImage);
			break;
		default:
			return false;
	}

	// Resize Image
    if(imagecopyresampled($NewCanves, $NewImage,0, 0, 0, 0, $NewWidth, $NewHeight, $iWidth, $iHeight))
    {
        // copy file
        if(imagejpeg($NewCanves,$DestImage,$Quality))
        {
            imagedestroy($NewCanves);
            return true;
        }
    }
}
    }

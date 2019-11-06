<?php

namespace App\Enhancers;

class ImageFly
{
	/**
	 * @param string default_image - Path for the default image which should be displayed instead of requested image when the requested image does not exist.
	 * @param string path_to_image - Path for the source image
	 * @param string size - Rendering image's width or height which needs to set
	 * @param string dimension - which dimension will be considered as the size of the image. Ex: height
	 * @param string quality - quality for the rendering image as a percentage
	 */
	function export_image($default_image, $path_to_image, $size, $dimension = "width", $quality = 100)
	{
		$valid = false;
		if($this->is_valid_image($path_to_image))
		{
			$valid=true;
		}
		else if($default_image != "" && $this->is_valid_image($default_image))
		{
			$valid=true;
			$path_to_image = $default_image;
		}
		
		if($valid)
		{
			// parse path for the extension
			$trueExtension = explode("/", getimagesize($path_to_image)['mime'])[1];
			list($width, $height, $img) = $this->get_image_width_height($trueExtension, $path_to_image);
			
			if($dimension == "height" || $dimension == "width")
			{
				if($dimension == "height")
				{
					$size=intval($size);
					
					$new_height=$size;
					if($new_height > $height)
					{
						$new_height=$height;
					}
					$new_width=floor($new_height*($width/$height));
				}
				else if($dimension == "width")
				{
					$size=intval($size);
					
					$new_width=$size;
					if($new_width > $width)
					{
						$new_width=$width;
					}
					$new_height=floor($new_width*($height/$width));
				}
			}
			else
			{
				if($width > $height)
				{
					$new_width = $size;
					$new_height=floor($new_width*($height/$width));
				}
				else
				{
					$new_height = $size;
					$new_width=floor($new_height*($width/$height));
				}
			}
			
			//if you don't need to loss the image quality when the thumb width or height larger than the original sizes
			//then uncomment below code block, then it will be loaded with the original image size but not in the expected size
			/*if($new_width>$width || $new_height>$height)
			{
				$new_width = $width;
				$new_height = $height;
			}*/
			
			//create a temporary image
			$tmp_img=$this->create_temp_image($new_width, $new_height);
			
			// copy and resize old image into new image
			imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			
			$this->export_temp_image($trueExtension, $tmp_img, $quality);
		}
		else
		{
			$size=intval($size);
			
			$img = imagecreatetruecolor($size, $size);
			imagesavealpha($img, true);
			$color = imagecolorallocatealpha($img, 0, 0, 0, 127);
			imagefill($img, 0, 0, $color);
			
			$this->export_temp_image("png", $img, $quality);
		}
	}
	
	/**
	 * @param string extension - image file's extension
	 * @param string tmp_img - Temporary image which was created using GD libarary
	 * @param string quality - quality for the rendering image as a percentage
	 */
	function export_temp_image($extension, $tmp_img, $quality)
	{
		$extension=strtolower($extension);
		$newFileLocation = UPLOAD_IMG.uniqid().".{$extension}";
		// save thumbnail into a file
		if($extension == "jpg" || $extension == "jpeg")
		{
			@header("Content-Type: image/jpeg");
			imagejpeg($tmp_img, $newFileLocation, $quality);
	        @header('Content-Length: '.filesize($newFileLocation));
			imagejpeg($tmp_img, NULL, $quality);
		}
		else if($extension == "gif")
		{
			@header("Content-Type: image/gif");
			imagegif($tmp_img, $newFileLocation);
	        @header('Content-Length: '.filesize($newFileLocation));
			imagegif($tmp_img);
		}
		else if($extension == "png")
		{
			$quality = ($quality/100)*9;
			$quality = intval($quality);
			@header("Content-Type: image/png");
			imagepng($tmp_img, $newFileLocation, $quality);
	        @header('Content-Length: '.filesize($newFileLocation));
			imagepng($tmp_img, NULL, $quality);
		}
		@unlink($newFileLocation);
		imagedestroy($tmp_img);
	}
	
	/**
	 * @param string width - Width for the temporary image
	 * @param string height - Height for the temporary image
	 */
	function create_temp_image($width, $height)
	{
		// create a new temporary image
		$tmp_img = imagecreatetruecolor($width, $height);
		
		//making a transparent background for image
		imagealphablending($tmp_img, false);
		$colorTransparent = imagecolorallocatealpha($tmp_img, 0, 0, 0, 127);
		imagefill($tmp_img, 0, 0, $colorTransparent);
		imagesavealpha($tmp_img, true);
		
		return $tmp_img;
	}
	
	/**
	 * @param string extension - Source image's extension
	 * @param string path_to_image - Path for of the source image
	 */
	function get_image_width_height($extension, $path_to_image)
	{
		$extension=strtolower($extension) ;
		
		// load image and get image size
		if($extension == "jpg" || $extension == "jpeg")
		{
			$img = imagecreatefromjpeg($path_to_image);
		}
		else if($extension == "gif")
		{
			$img = imagecreatefromgif($path_to_image);
		}
		else if( $extension == "png")
		{
			$img = imagecreatefrompng($path_to_image);
		}
		
		$width = imagesx($img);
		$height= imagesy($img);
		
		return array($width, $height, $img);
	}
	
	/**
	 * @param string path_to_image - Path for the source image
	 */
	function is_valid_image($path_to_image)
	{
		//assume this is an invalid image
		$valid = false;
		
		if(@file_exists($path_to_image) && is_file($path_to_image))
		{
			try{
				$image_size = getimagesize($path_to_image);
				
				if(isset($image_size[2]) && in_array($image_size[2], array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
				{
					$valid = true;
				}
			}
			catch(Exception $e)
			{
				
			}
		}
		
		return $valid;
	}
}

<?php

namespace App\Jobs;


use Spatie\Image\Image;
use Spatie\Image\Enums\Unit;
use Spatie\Image\Enums\CropPosition;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResizeImage implements ShouldQueue
{
    use Queueable;
    
    /**
    * Create a new job instance.
    */
    private $w, $h, $fileName, $path;
    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }
    
    /**
    * Execute the job.
    */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;
        
        
        // Inserire bestemmia alla madonna
        $image = Image::load($srcPath);
        $width = $image->getWidth();
        $height = $image->getHeight();
        
        $aspectRatio = $w / $h;
        $cropWidth = $width;
        $cropHeight = (int) round($width / $aspectRatio);
        
        if ($cropHeight > $height) {
            $cropHeight = $height;
            $cropWidth = (int) round($height * $aspectRatio);
        }
        
        $image
        ->crop($cropWidth, $cropHeight, CropPosition::Center)
        ->resize($w, $h)
        ->watermark(
            base_path('resources/img/intellex.png'),
            width: 200,
            height: 200,
            paddingX: 50,
            paddingY: 10,
            paddingUnit: Unit::Percent
        )
        ->save($destPath);
            
            
            
    }
}
    
<?php

namespace App\Traits\Admin\Product;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadImageTrait
{
    /**
     * Upload product image
     */
    public function uploadProductImage( UploadedFile $image,string $folder = 'products'): string {
        $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
        return $image->storeAs($folder, $fileName, 'public');
    }

    /**
     * Update product image (delete old then upload new)
     */
    public function updateProductImage(UploadedFile $image,?string $oldImagePath,string $folder = 'products'): string {
        if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
            Storage::disk('public')->delete($oldImagePath);
        }

        return $this->uploadProductImage($image, $folder);
    }

    /**
     * Delete product image
     */
    public function deleteProductImage(?string $imagePath): void
    {
        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }
}

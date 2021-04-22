<?php

namespace App\Models;

use App\Traits\Auditable;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Template extends Model implements HasMedia
{
    use SoftDeletes, Auditable, HasFactory,InteractsWithMedia;
    public $table = 'templates';
     protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
     protected $appends = [
         'banner_image'
     ];

     protected $fillable = [
        'username',
        'banner_title',
        'description',
         'payment_type',
         'created_at',
        'updated_at',
        'deleted_at',
    ];

     public function payment()
     {
         return $this->hasMany(Payment::class);
     }

     public function user()
     {
        return $this->belongsTo(User::class);
     }
     public function  getBannerImageAttribute()
     {
       $file = $this->getMedia('banner_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }
        return $file;
      }



      public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 80, 80);
        $this->addMediaConversion('preview')->fit('crop', 1024, 560);
    }
     protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

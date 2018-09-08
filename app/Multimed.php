<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimed extends Model
{
  protected $fillable = [
    'title',
    'alt',
    'attr',
    'attr_link',
    'license',
    'license_link',
    'safename',
    'folder',
    'filename',
    'filetype',
    'image_use_type',
    'extension',
    'filesize',
  ];


  public function getRouteKeyName()
  {
    return 'filename';
  }

  public function getFileSizeAttribute($size) {
    if ($size >= 1<<30)
      return number_format($size/(1<<30),2)."GB";
    if ($size >= 1<<20)
      return number_format($size/(1<<20),2)."MB";
    if ($size >= 1<<10)
      return number_format($size/(1<<10),2)."KB";
    
    return number_format($size)." bytes";
  }

  public function articles()
  {
    return $this->belongsToMany('App\Article');
  }
}

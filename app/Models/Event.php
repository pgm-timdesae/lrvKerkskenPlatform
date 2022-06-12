<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  use HasFactory;

  protected $table = 'events';

  protected $primaryKey = 'id';

  protected $fillable = ['name', 'location', 'category_id', 'date', 'description'];

  public function scopeFilter($query, array $filters)
  {
    if ($filters['search'] ?? false) {
      $query
        ->where('name', 'like', '%' . request('search') . '%');
    }
  }

  public function users()
  {
    return $this->belongsToMany(User::class, 'event_user')->withPivot('time', 'id');
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'short_name',
    'is_active',
    'time',
  ];

  /**
   * Get all of the queue's tickets.
   */
  public function tickets()
  {
      return $this->belongsToMany(Ticket::class, 'tickets_queues')->withPivot('status','position');
  }
}

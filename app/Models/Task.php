<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'task_name',
        'content',
        'start_date',
        'end_date',
        'status',
        'priority',
        'content',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date'=> 'date',
        'end_date' => 'date',
        'status' => 'integer',
        'priority' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    private const PENDING = 1;
    private const PROCESS = 2;
    private const DONE = 3;
    private const STATUSLIST = 
    [
        self::PENDING => 'On pending',
        self::PROCESS => 'On process',
        self::DONE => 'Done',
    ];

    public function getStatus()
    {
        return self::STATUSLIST[$this->status];
    }

    private const URGENT = 1;
    private const HIGH = 2;
    private const MEDIUM = 3;
    private const LOW = 4;
    private const PRIORITYLIST = 
    [
        self::URGENT => 'Urgent',
        self::HIGH => 'High',
        self::MEDIUM => 'Medium',
        self::LOW => 'Low',
    ];

    public function getPriority()
    {
        return self::PRIORITYLIST[$this->priority];
    }

    public function scopeStatus($query,$status=null)
    {
        if ($status == null){
            return $query;
        }
        else {
            return $query->where('status', $status);
        }
    }
    public function scopePriority($query,$priority = null)
    {
        if ($priority == null){
            return $query;
        }
        else {
            return $query->where('priority', $priority);
        }
    }

    // public function scopeStatus($query, $status = null)
    // {
    //     if($status == null) {
    //         return $query;
    //     }
    //     else { return $query->where('status', $status);}
    // }

    // public function scopePriority($query, $priority = null)
    // {
    //     if($priority == null) {
    //         return $query;
    //     }
        
    //     else{return $query->where('priority', $priority);}
    // }
    // public function scopeStatus($query, $status = null)
    // {
    //     return $status ? $query->where('status', $status) : $query;
    // }

    // public function scopePriority($query, $priority = null)
    // {
    //     return $priority ? $query->where('priority', $priority) : $query;
    // }
    public function scopeStartDate($query,$startDate = null)
    {
        if ($startDate == null){
            return $query;
        }
        else {
            return $query->where('start_date', '>', $startDate);
        }
    }

    public function scopeEndDate($query,$endDate = null)
    {
        if ($endDate == null){
            return $query;
        }
        else {
            return $query->where('end_date', '<', $endDate);
        }
    }
}

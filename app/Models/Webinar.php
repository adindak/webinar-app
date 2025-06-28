<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ParticipantsWebinar;

class Webinar extends Model
{
    protected $table = 'master_webinar';
    protected $fillable = [
        'name',
        'start_date',
        'start_time',
        'place_location',
        'description',
        'price',
        'published',
        'access',
        'total_participants',
        'image',
        'link'
    ];
    
    public function participants() {
        return $this->hasMany(ParticipantsWebinar::class, 'webinar_id', 'id');
    }

    /**
     * Get the count of participants
     */
    public function getParticipantsCountAttribute()
    {
        return $this->participants()->count();
    }

    /**
     * Get the attended participants count
     */
    public function getAttendedCountAttribute()
    {
        return $this->participants()->where('is_participant', true)->count();
    }

    /**
     * Get the attendance rate
     */
    public function getAttendanceRateAttribute()
    {
        $total = $this->participants_count;
        $attended = $this->attended_count;
        
        return $total > 0 ? round(($attended / $total) * 100) : 0;
    }

    /**
     * Scope for public webinars
     */
    public function scopePublic($query)
    {
        return $query->where('access', 'public');
    }

    /**
     * Scope for upcoming webinars
     */
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now()->format('Y-m-d'));
    }

    /**
     * Scope for past webinars
     */
    public function scopePast($query)
    {
        return $query->where('start_date', '<', now()->format('Y-m-d'));
    }
}

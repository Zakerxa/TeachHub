<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'experience',
        'experience_description',
        'time',
        'online_or_local',
        'international_or_government',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subjects');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'teacher_locations')->withPivot('township');
    }


    function scopeFilter($query, $filter)
    {

        $query->when($filter['name'] ?? false, function ($query, $name) {
           return $query->where('name', 'like', '%' . $name . '%');
        });

        $query->when($filter['locations'] ?? false, function ($query, $locationId) {
            $locationId = explode(',',$locationId);
            return $query->whereHas('locations', function ($query) use ($locationId) {
                $query->whereIn('location_id', $locationId);
            });
        });

        $query->when($filter['subjects'] ?? false, function ($query, $subjectId) {
            $subjectId = explode(',', $subjectId);
            return $query->whereHas('subjects', function ($query) use ($subjectId) {
                $query->whereIn('subject_id', $subjectId);
            });
        });

    }
}

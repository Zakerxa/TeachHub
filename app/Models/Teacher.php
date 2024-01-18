<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeacherLocation;
use App\Models\ClassType;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['subjects', 'locations', 'classTypes'];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subjects')->withTimestamps();
    }

    public function locations()
    {
        return $this->hasMany(TeacherLocation::class, 'teacher_id');
    }

    public function classTypes()
    {
        return $this->hasOne(ClassType::class);
    }

    public function getEnvironmentAttribute($value)
    {
        if ($value == 1) return $value = 'International Schools';
        else if ($value == 2) return $value = 'Government Schools';
        else return $value = null;
    }

    public function getEnvironmentMmAttribute($value)
    {
        if ($value == 1) return $value = 'နိုင်ငံတကာကျောင်း';
        else if ($value == 2) return $value = 'အစိုးရကျောင်း';
        else return $value = null;
    }

    function scopeFilter($query, $filter)
    {

        $query->when($filter['name'] ?? false, function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        });

        $query->when($filter['region'] ?? false, function ($query, $region) {
            return $query->whereHas('locations', function ($query) use ($region) {
                $query->where('region_state', $region);
            });
        });

        $query->when($filter['capital'] ?? false, function ($query, $capital) {
            return $query->whereHas('locations', function ($query) use ($capital) {
                $query->where('capital', $capital);
            });
        });

        $query->when($filter['townships'] ?? false, function ($query, $townships) {
            $townships = explode(',', $townships);
            return $query->whereHas('locations', function ($query) use ($townships) {
                $query->whereIn('township', $townships);
            });
        });

        $query->when($filter['status'] ?? false, function ($query, &$status) {
            if ($status['id'] == 3) {
                $query->whereIn('online_or_local',[1,2,3]);
            } else {
                $query->where('online_or_local', $status['id']);
            }
        });

        $query->when($filter['classType'] ?? false, function ($query, $type) use ($filter) {
            if ($filter['status'] ?? false) {
                return $query->whereHas('classTypes', function ($query) use ($type, $filter) {
                    if ($filter['status']['id'] == 3) {
                        $query->whereIn('status', [1,2,3])->where('class_type', $type);
                    } else {
                        $query->where('status', $filter['status']['id'])->where('class_type', $type);
                    }
                });
            }
        });

        $query->when($filter['environment'] ?? false, function ($query, $environment) {
            $environmentId = explode(',', $environment);
            $query->whereIn('environment', $environmentId);
        });

        $query->when($filter['subjects'] ?? false, function ($query, $subjectId) {
            $subjectId = explode(',', $subjectId);
            return $query->whereHas('subjects', function ($query) use ($subjectId) {
                $query->whereIn('subject_id', $subjectId);
            });
        });
    }

    // Register the deleting event to handle cascading delete
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($teacher) {
            // Delete associated classTypes
            $teacher->classTypes()->delete();
        });
    }
}

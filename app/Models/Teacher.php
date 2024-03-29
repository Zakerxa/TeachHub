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

    protected $with = ['subjects', 'locations', 'classTypes', 'educationLevels'];

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
        return $this->hasMany(ClassType::class, 'teacher_id');
    }

    public function educationLevels()
    {
        return $this->hasMany(EducationLevel::class, 'teacher_id');
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
        else if ($value == 2) return $value = 'အစိုးရသင်ရိုး';
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

        $query->when($filter['gender'] ?? false, function ($query, $gender) {
            return $query->where('extra',  $gender);
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
                $query->whereIn('online_or_local', [1, 2, 3]);
            } else {
                $query->where('online_or_local', $status['id']);
            }
        });

        $query->when($filter['classType'] ?? false, function ($query, $type) use ($filter) {
            $classTypeId = explode(',', $type);
            if ($filter['status'] ?? false) {
                return $query->whereHas('classTypes', function ($query) use ($classTypeId, $filter) {
                    $query->whereIn('class_type', $classTypeId);
                });
            }
        });


        $query->when($filter['environment'] ?? false, function ($query, &$environment) {
            // $environmentId = explode(',', $environment);
            $query->where('environment', $environment);
        });

        $query->when($filter['education'] ?? false, function ($query, $education) use ($filter) {
            $educationId = explode(',', $education);
            if ($filter['environment'] ?? false) {
                return $query->whereHas('educationLevels', function ($query) use ($educationId, $filter) {
                    $query->whereIn('value', $educationId)->where('environment_id', $filter['environment']);
                });
            }
        });

        $query->when($filter['subjects'] ?? false, function ($query, $subjectId) {
            $subjectId = explode(',', $subjectId);

            if (in_array('1', $subjectId)) {
                return $query->whereHas('subjects', function ($query) use ($subjectId) {
                    $query->whereIn('subject_id', $subjectId);
                });
            }else{
                $subjectId[] = '1';
                return $query->whereHas('subjects', function ($query) use ($subjectId) {
                    $query->whereIn('subject_id', $subjectId);
                });
            }
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Course
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $full_description
 * @property integer $skill_id
 * @property integer $study_type_id
 * @property string $price
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereFullDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereSkillId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereStudyTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Course extends Model
{
    //
}

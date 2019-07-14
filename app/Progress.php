<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    //

    public function childstep(){
        return $this->belongsTo('App\Childstep');
    }


    public function reports()
    {
        return $this->hasMany('App\Report');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPercentageAchievement()
    {
        return $this->percentage_achievement;
    }

    public function getTotalWorkingTime()
    {
        return $this->total_working_time;
    }


    public function getChildstepNumberOfStep()
    {
        return $this->childstep->number_of_step;
    }


    public function getChildstepTitle()
    {
        return $this->childstep->title;
    }


    public function getChildstepTimeRequired()
    {
        return $this->childstep->time_required;
    }




}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Childstep extends Model
{

//    public function clears()
//    {
//        return $this->hasMany('App\Clear');
//    }

//    public function childstep_progresses()
//    {
//        return $this->hasMany('App\Progress');
//    }

    public function progresses()
    {
        return $this->hasMany('App\Progress');
    }



    public function getId()
    {
        return $this->id;
//        if(!empty($this->id)){
//            return $this->id;
//        }else{
//            return 0;
//
//        }


    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getNumberOfStep()
    {
        return $this->number_of_step;
    }

    public function getTimeRequired()
    {
        return $this->time_required;
    }

    public function getPicImg()
    {
        if(!empty($this->pic_img)){
            return $this->pic_img;
        }else{
            return 'sample-img.png';

        }
    }


    public function getCreatedAt()
    {
        return $this->created_at;
    }




}

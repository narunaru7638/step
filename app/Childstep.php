<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Childstep extends Model
{

    public function clears()
    {
        return $this->hasMany('App\Clear');
    }

    public function getId()
    {
        return $this->id;
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

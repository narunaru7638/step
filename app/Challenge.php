<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
//    public function step(){
//        return $this->belongsTo('App\Step');
//    }

    public function progresses()
    {
        return $this->hasMany('App\Progress');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCompleteFlg()
    {
        return $this->complete_flg;
    }

    public function getDeleteFlg()
    {
        return $this->delete_flg;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }



}

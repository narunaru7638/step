<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{

    /**
     * 状態定義
     */
    const STATUS = [
        1 => [ 'label' => '未入力' ],
        2 => [ 'label' => 'プログラミング' ],
        3 => [ 'label' => 'ダイエット' ],
        4 => [ 'label' => '英語' ],
        5 => [ 'label' => 'スポーツ' ],

    ];

    /**
     * 状態のラベル
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['category_id'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    //他テーブルとの関係を記載
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function childsteps()
    {
        return $this->hasMany('App\Childstep');
    }

    public function challenges()
    {
        return $this->hasMany('App\Challenge');
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

    public function getNumberOfChallenger()
    {
        return $this->number_of_challenger;
    }

    public function getPicImg()
    {
        if(!empty($this->pic_img)){
            return $this->pic_img;
        }else{
            return 'sample-img.png';

        }
    }

    public function getRequiredTime()
    {
        return $this->required_time;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    //belongTo結合のgetter
    public function getUserId()
    {
        return $this->user->id;
    }

    public function getUserName()
    {
        return $this->user->name;
    }

    public function getCategoryId()
    {
        return $this->category->id;
    }

    public function getCategoryName()
    {
        return $this->category->name;
    }

}

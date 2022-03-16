<?php

namespace App\Model\Admin;
use Auth;
use App\Model\BaseModel;
use App\Model\Common\Customer;
use App\Model\Common\User;
use Illuminate\Database\Eloquent\Model;
use App\Model\Common\File;
use DB;

class Config extends BaseModel
{
    protected $table = 'configs';
    protected $fillable = [];

    public function image()
    {
        return $this->morphOne(File::class, 'model');
    }

    public static function getDataForEdit($id)
    {
        return self::where('id', $id)
            ->with([
                'image'
                ])
            ->firstOrFail();
    }
}

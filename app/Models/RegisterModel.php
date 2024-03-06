<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model {
    use HasFactory;

    // protected $fillable = ['name','email','mobile','year','department'];
    protected $guarded = [];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         // Additional actions before creating the model
    //         $model->status = 'A';
    //     });
    // }

    public function getRegister($data) {
        return $this->create($data);
    }

    public function getLoginCondition($email) {
        return $this->where("email", $email)->first();
        // return $this->find($email);
    }

    public function getShowValues($id = null) {
        $query = $this->select("id", "name", "email", "mobile", "year", "department");

        if (is_null($id)) {
            return $query->where("status", 'A')->get();
        } else {
            return $query->where('id', $id)->first();
        }
        // if (is_null($id)) {
        //     return $query->where("status", 'A')->get()->toArray();
        // } else {
        //     return $query->where('id', $id)->get()->toArray();
        // }
    }

    public function getUpdateValues($id, $name = null, $email = null, $mobile = null, $year = null, $department = null) {
        $data = $this->find($id);
        if (!is_null($id) && is_null($name) && is_null($email) && is_null($mobile) && is_null($year) && is_null($department)) {
            $data->update([
                'status' => 'D'
            ]);
        } else {
            $data->update([
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'year' => $year,
                'department' => $department
            ]);
        }
        return $data;
    }
}

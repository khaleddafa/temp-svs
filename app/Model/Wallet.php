<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['user_id','name','balance','referral_balance','status','is_primary','coin_type','coin_id','key','type'];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function co_users() {
        return $this->hasMany(WalletCoUser::class);
    }
    
    public function co_users_app($perPage) {
        return $this->hasMany(WalletCoUser::class)->with('user')->paginate($perPage);
    }

    public function coin(){
        return $this->hasOne(Coin::class,'id','coin_id');
    }
}

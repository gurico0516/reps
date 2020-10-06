<?php

use App\Entities\User;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Exception;

class UserService
{
    /**
     * 登録する
     *
     * @param array $inputs 入力値
     * @return void
     * @throws Exception|Throwable
     */
    public function store(array $inputs)
    {
        $entity = User::make();
        $entity->id = $inputs['id'];
        $entity->last_name = $inputs['last_name'];
        $entity->first_name = $inputs['first_name'];
        $entity->email = $inputs['email'];
        $entity->password = Hash::make($inputs['password']);
        $entity->save();
    }
}

<?php
namespace App\Services;

use App\Models\User;

class UserService extends BaseService {

    public function __construct(User $model){
        $this->model = $model;
    }
    public function create(array $attributes){
        return $this->model->create($attributes);
    }

    public function update(array $attributes){
        return $this->model->update($attributes);
    }
}

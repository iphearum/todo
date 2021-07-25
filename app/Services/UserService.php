<?php
namespace App\Services;

use App\Models\User;
use App\Pipelines\Name;

class UserService extends BaseService {

    public function __construct(User $model){
        $this->model = $model;
    }

    public function getUser(){
        return $this->pipe([Name::class]);
    }
    public function create(array $attributes){
        return $this->model->create($attributes);
    }

    public function update(array $attributes){
        return $this->model->update($attributes);
    }
}

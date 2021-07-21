<?php
namespace App\Services;

use App\Models\Todo;

class TodoService extends BaseService {

    public function __construct(Todo $model){
        $this->model = $model;
    }

    public function create(array $attributes){
        return $this->model->create($attributes);
        // return $this->model;
        // return Todo::create($attributes);
    }

    public function update(array $attributes){
        return $this->model->update($attributes);
    }
}

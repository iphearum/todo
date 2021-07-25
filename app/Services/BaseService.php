<?php
namespace App\Services;

use Illuminate\Pipeline\Pipeline;

class BaseService{

    public $model;

    public function create(array $attributes){
        return $this->model->create($attributes);
    }

    public function update(array $attributes){
        // [
        //     'id'=>1,
        //     ...
        // ]
        $id = $attributes['id'];
        unset($attributes['id']);
        return $this->model->where('id', $id)->update($attributes);
    }

    public function pipe(array $pipelines){
        return app(Pipeline::class)
            ->send($this->model->query())
            ->through($pipelines)
            ->thenReturn()->get();
    }
}

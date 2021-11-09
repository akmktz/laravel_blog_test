<?php

namespace App\Transformers;

use App\Entities\Blog;
use League\Fractal\TransformerAbstract;

/**
 * Class BlogTransformer.
 *
 * @package namespace App\Transformers;
 */
class BlogTransformer extends TransformerAbstract
{
    /**
     * Transform the Blog entity.
     *
     * @param \App\Entities\Blog $model
     *
     * @return array
     */
    public function transform(Blog $model)
    {
        $result = [
            'id' => (int) $model->id,
            'user_id' => (int) $model->user_id,
            'is_top' => (bool) $model->is_top,
            'title' => (string) $model->title,
            'file' => (string) $model->file,
            'text' => (string) $model->text,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];

        if ($model->relationLoaded('user')) {
            $userTransformer = new UserTransformer();
            $result['user'] = $userTransformer->transform($model->user);
        }

        return $result;
    }
}

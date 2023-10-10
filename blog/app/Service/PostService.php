<?php

namespace App\Service;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data){
        try{
            DB::beginTransaction();

            if (isset($data['tag_ids'])){
                $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            }

            //заносим в бд путь к изображению (Storage::put сохраняет изображение и возвращает путь к нему)
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::firstOrCreate([
                'title' => $data['title'],
                'content' => $data['content'],
                'preview_image' => $data['preview_image'],
                'main_image' => $data['main_image'],
                'category_id' => $data['category_id'],
            ]);
            if(isset($tagIds)){
                $post->tags()->attach($tagIds);
            }

            DB::commit();
        } catch(\Exception $exseption){
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try{
            DB::beginTransaction();

            if (isset($data['tag_ids'])){
                $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            }

            //заносим в бд путь к изображению (Storage::put сохраняет изображение и возвращает путь к нему)
            if(isset($data['preview_image'])){
                    $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
                }

            if(isset($data['main_image'])){
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post->update($data);

            if(isset($tagIds)){
                $post->tags()->sync($tagIds);
            }


            DB::commit();

        }catch(Exception $exseption){
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}

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
                'website' => isset($data['website']) && $data['website'] !== '0' ? $data['website'] : null,
                'youtube' => isset($data['youtube']) && $data['youtube'] !== '0' ? $data['youtube'] : null,
                'vk' => isset($data['vk']) && $data['vk'] !== '0' ? $data['vk'] : null,
                'telegram' => isset($data['telegram']) && $data['telegram'] !== '0' ? $data['telegram'] : null,
                'odnoklassniki' => isset($data['odnoklassniki']) && $data['odnoklassniki'] !== '0' ? $data['odnoklassniki'] : null,
                'country' => isset($data['country']) && $data['country'] !== '0' ? $data['country'] : null,
                'region' => isset($data['region']) && $data['region'] !== '0' ? $data['region'] : null,
                'district' => isset($data['district']) && $data['district'] !== '0' ? $data['district'] : null,
                'city' => isset($data['city']) && $data['city'] !== '0' ? $data['city'] : null,
                'street ' => isset($data['street ']) && $data['street '] !== '0' ? $data['street '] : null,
                'building' => isset($data['building']) && $data['building'] !== '0' ? $data['building'] : null,
                'coordinates' => isset($data['coordinates']) && $data['coordinates'] !== '0' ? $data['coordinates'] : null,
                'map' => isset($data['map']) && $data['map'] !== '0' ? $data['map'] : null,
            ]);
            // dd($post);
            if(isset($tagIds)){
                $post->tags()->attach($tagIds);
            }
            // dd($post);

            DB::commit();
        } catch(\Exception $exseption){
            DB::rollBack();
            $exseption->getMessage();
            return $exseption;
            // abort(500);
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

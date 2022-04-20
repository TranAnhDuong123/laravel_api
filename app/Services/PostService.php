<?php
namespace App\Services;

use App\Repositories\PostRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use App\Models\Post;

class PostService{
    protected $postRepository;
    public function __construct(PostRepository $postRepository){
        $this->postRepository = $postRepository;
    }
    public function savePostData($data){
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            throw new InvaliArgumentException($validator->errors()->first());
        }
        $result = $this->postRepository->save($data);
        return $result;
    }
    public function getAll(){
        return $this->postRepository->getAllPost();
    }
    public function getById($id){
        return $this->postRepository->getById($id);
    }
    public function updatePost($data, $id){
        
    }
}
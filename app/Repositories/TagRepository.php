<?php
namespace App\Repositories;

use App\Tag;
use Illuminate\Support\Str;

class TagRepository
{
    protected $tag;

    public function __construct(Tag $tag)
	  {
		    $this->tag = $tag;
	  }

	  public function store($post, $tags)
	  {
		    $tags = explode(',', $tags);

		    foreach ($tags as $tag)
        {
			       $tag = trim($tag);
             /*AB we genrate an url with the str for exemple tag 1 => tag-1*/
			       $tag_url = Str::slug($tag);
             /*AB we check if this tag already exist*/
             $tag_ref = $this->tag->where('tag_url', $tag_url)->first();

      			if(is_null($tag_ref))
      			{
      				$tag_ref = new $this->tag([
      					'tag' => $tag,
      					'tag_url' => $tag_url
      				]);

      				$post->tags()->save($tag_ref);

      			} else {
      				$post->tags()->attach($tag_ref->id);
      			}
		    }
	  }

}

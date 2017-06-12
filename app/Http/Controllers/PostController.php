<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    protected $postRepository;

    protected $nbrPerPage = 4;

    public function __construct(PostRepository $postRepository)
	{
		$this->middleware('auth', ['except' => 'index', 'indexTag','language']);
		$this->middleware('admin', ['only' => 'destroy']);

		$this->postRepository = $postRepository;
	}

	public function index()
	{
		$posts = $this->postRepository->getWithUserAndTagsPaginate($this->nbrPerPage);
		$links = $posts->render();

		return view('posts.liste', compact('posts', 'links'));
	}

	public function create()
	{
		return view('posts.add');
	}

	public function store(PostRequest $request, TagRepository $tagRepository)
	{
		$inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);

    $post =	$this->postRepository->store($inputs);

    if(isset($inputs['tags']))
    {
        $tagRepository->store($post, $inputs['tags']);
    }

		return redirect(route('post.index'));
	}

	public function destroy($id)
	{
		$this->postRepository->destroy($id);

		return redirect()->back();
	}

  /*AB - This function run the research for posts witch has this tag and send back data in the view liste */
  public function indexTag($tags)
  {
      $posts = $this->postRepository->getWithUserAndTagsForTagPaginate($tag, $this->nbrPerPage);

      $links = $posts->render();

      return view('posts.liste', compact('posts', 'links'))
        //->with('info', 'Résultats pour la recherche du mot-clé : ' . $tag);
        ->with('info', trans('blog.search') . $tag); // update because using language trans
  }

  /*AB - function is used to define the language*/
  public function language()
  {
        session()->put('locale', session('locale') == 'fr' ? 'en' : 'fr');

        return redirect()->back();

    }
}

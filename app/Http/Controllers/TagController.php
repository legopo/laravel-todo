<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $tag;

    public function __construct(
        Tag $tag,
    ) {
        $this->tag = $tag;
    }
    /**
     * 一覧(GET)
     *
     * @param String $tag
     * @return void
     */
    public function index(String $tag)
    {
        $tasks = $this->tag->getTaggedTasks($tag, \Auth::id());

        return view('tags/index', compact('tag', 'tasks'));
    }
}

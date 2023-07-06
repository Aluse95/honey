<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Services\ContentService;
use App\Consts;
use App\Models\Page;

class SitemapXmlController extends Controller
{
    public function index()
    {

        $pages = Page::where('status', "!=", Consts::STATUS_DELETE)
            ->orderByRaw('status ASC, iorder ASC, id DESC')
            ->get();

        $params['status'] = Consts::TAXONOMY_STATUS['active'];
        $taxonomys =  ContentService::getCmsTaxonomy($params)->get();

        $paramPost['status'] = Consts::POST_STATUS['active'];
        $posts = ContentService::getCmsPost($paramPost)->get();


        return response()->view('frontend.sitemap.index', [
            'pages' => $pages,
            'taxonomys' => $taxonomys,
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }
}

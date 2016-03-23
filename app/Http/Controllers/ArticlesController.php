<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use DB;
use Response;

class ArticlesController extends Controller
{
    
    public function index(){
    	$articles = DB::table('xg4ut_k2_items AS items')
                    ->join('xg4ut_k2_categories AS categories', 'items.catid', '=', 'categories.id')
                    ->select('items.title', 'items.introtext', 'categories.name', 'items.extra_fields_search','items.created')
                    ->orderBy('items.id', 'desc')
                    ->take(50)
                    ->get();  
    	return Response::json([
    		'data' => $articles
    		], 200);
    }

    public function show($id){
    	$article = DB::table('xg4ut_k2_items AS items')
                    ->join('xg4ut_k2_categories AS categories', 'items.catid', '=', 'categories.id')
                    ->select('items.title', 'items.introtext', 'categories.name', 'items.extra_fields_search', 'items.created')
                    ->orderBy('items.id', 'desc')
                    ->where('items.id','=',$id)
                    ->first();
    	if(!$article){
    		return Response::json([
    			'error' => [
    				'message' => 'Article does not exist'
    			]
    			], 404);
    	}

    	return Response::json([
    		'data' => $article
    		], 200);
    }

}

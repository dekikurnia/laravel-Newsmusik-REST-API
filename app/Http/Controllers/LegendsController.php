<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use DB;
use Response;

class LegendsController extends Controller
{
    
    public function index(){
    	$articles = DB::table('xg4ut_k2_items AS items')
                    ->join('xg4ut_k2_categories AS categories', 'items.catid', '=', 'categories.id')
                    ->select('items.id','items.title', 'items.introtext', 'categories.name', 'items.extra_fields_search','items.image_credits','items.created', 'image_caption')
                    ->orderBy('items.id', 'desc')
                    ->where('categories.name', '=', 'Legend')
                    ->get();  
    	return Response::json([
    		'data' => $articles
    		], 200);
    }

}

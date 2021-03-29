<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Idea;
use App\Tag;

class SearchController extends Controller
{
    public function search(Request $request)
    {  
        
         $des_or_tags=$request->get('des_or_tags');
         $search=$request->get('search');
         $partial_match=$request->get('partial_match')==true;
         if($des_or_tags=="destination"){
        // dd($des_or_tags,$search,$partial_match);
            if($partial_match==true){
              $ideas=Idea::where('destination','LIKE','%'.$request->search."%")->get();
             }else{
              $ideas=Idea::where('destination','=',$request->search)->get();
            } 
          }else{
           if($partial_match==true){
            $user->posts()->where('active', 1)->get();
              $tags=Tag::where('tag_name','LIKE','%'.$request->search."%")->get();
             }else{
              $tags=Tag::where('tag_name','LIKE','%'.$request->search."%")->get();
            } 
            $ideas=array();
            foreach($tags as $tag){
              $idea=Idea::find($tag->idea_id);
              array_push($ideas,$idea);
            }
          }
        if($search==null){
          $ideas = Idea::all();
        }
        $count = count($ideas);
	    	return view("ideas.view_all_ideas",compact('ideas','count'));
    }

}
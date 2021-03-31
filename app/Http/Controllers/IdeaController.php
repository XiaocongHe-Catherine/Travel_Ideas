<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ideas = Idea::all();
        $count = count($ideas);
		return view("ideas.view_all_ideas",compact('ideas','count'));
    }
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idea = new Idea;
        //create the add a idea form
        return view('ideas.create_idea');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    //1. validate the inputted data 
        $request->validate([
          'title'=>'required',
          'user_id' => '0',
          'destination'=> 'required',
          'start_date'=> 'required|date_format:Y-m-d',
          'end_date' => 'required|date_format:Y-m-d',
          ]);
        //2. create a new idea model
        $idea = new Idea([
          'title' => $request->get('title'),
          'user_id' => Auth::user()->id,
          'destination'=> $request->get('destination'),
          'start_date'=> $request->get('start_date'),
          'end_date'=> $request->get('end_date'),     
          ]);
        $tags_name=$request->get('tags');
        $comma=',';
         //4. save the Idea into database
        $idea->save();
        foreach(explode(',',$tags_name) as $tag_name){
            $tag = new Tag(['tag_name'=>$tag_name]);
            $idea->tags()->save($tag);
        }
        return redirect()->route('ideas.show',$idea->id)->with('success', 'Idea has been created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
             //fecth a book by id
		$idea = Idea::find($id);
		return view("ideas.view_idea",compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idea = Idea::find($id);
        return view('ideas.edit_idea', compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           //1. validate the inputted data 
           $request->validate([
            'title'=>'required',
            'user_id' => '0',
            'destination'=> 'required',
            'start_date'=> 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
            ]);
            //2. search the idea from database
            $idea = Idea::find($id);

            //3. set the new values 
            $idea->title = $request->get('title');
            $idea->destination =$request->get('destination');
            $idea->start_date = $request->get('start_date');
            $idea->end_date = $request->get('end_date'); 
            $tags_name=$request->get('tags');
            $comma=',';
             //4. save the Idea into database
            $idea->save();
            $idea->tags()->delete();
            foreach(explode(',',$tags_name) as $tag_name){
                $tag = new Tag(['tag_name'=>$tag_name]);
                $idea->tags()->save($tag);
            }
        return redirect()->route('ideas.show',$idea->id)->with('success', 'Idea has been updated Successfully');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $idea = Idea::find($id);
        $idea->delete();
        $idea->tags()->delete();
       return redirect()->route('ideas.index')->with('success', 'Idea has been deleted Successfully');
    }

}

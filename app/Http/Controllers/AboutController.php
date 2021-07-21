<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function HomeAbout(){
        // $homeabout = DB::table('home_abouts')->get();
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeabout'));
    }
    public function AddAbout(){
        return view('admin.home.create');
    }
    public function StoreAbout(Request $request){
        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.about')->with('success','about Add Successfully');
    }
    //EDIT
    public function Edit($id){
        $home_abouts = HomeAbout::find($id);
        return view('admin.home.edit', compact('home_abouts'));
    }
    //EDIT
    public function Update(Request $request, $id){
        HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.about')->with('success','Update About Successfully');
    }
    //EDIT
    public function Delete($id){
        $delete = HomeAbout::find($id)->delete();
        return Redirect()->route('home.about')->with('success','Delete About Successfully');
    }
}

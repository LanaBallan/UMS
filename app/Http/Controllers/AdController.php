<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function add()
    {
        return view('Affairs Dashboard.Ad.add');
    }
    public function store(Request $request)
    {
        $data = $request->input();
        $ad=new Ad;
        $ad->description=$data['description'];
        $ad->date=$data['date'];
        if($request->has('img'))
        {
            $imageName = rand().time().'.'.$request->img->getClientOriginalExtension();
            $request->img->move(public_path('upload'), $imageName);
            $ad->img=$imageName;
        }
        $ad->save();
        return redirect('/affairs/ad/all');
    }
    public function all()
    {
        $ads=Ad::get();
        return view('Affairs Dashboard.Ad.all',compact('ads'));
    }
    public function edit($id)
    {
$ad=Ad::where('id',$id)->first();
        return view('Affairs Dashboard.Ad.edit',compact('ad'));
    }
public function update(Request $request,$id)
{
    $ad=Ad::where('id',$id)->first();
    $data = $request->input();
    $ad->description=$data['description'];
    $ad->date=$data['date'];
    if($request->has('img'))
    {
        $imageName = rand().time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('upload'), $imageName);
        $ad->img=$imageName;
    }
    $ad->save();
    return redirect('/affairs/ad/all');
}
public function delete($id)
{
    $ad=Ad::where('id',$id)->first();
    $ad->delete();
    return back();
}
}

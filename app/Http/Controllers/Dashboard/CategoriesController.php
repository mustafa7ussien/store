<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        select a.*,b.name as parent_name from categories as a
        left join categories as b on b.id= a.parent_id
        */ 
        $name=request()->query('name');
        $status=request()->query('status');
        $query=Category::leftJoin('categories as parents','parents.id','=','categories.parent_id')->select(
            [
                'categories.*',
                'parents.name as parent_name'
            ]);
        if($name)
        {
            $query->where('categories.name','LIKE',"%{$name}%");
        }
        if($status)
        {
            $query->where('categories.status','=',$status);
        }
        //
        $categories=$query->paginate(4);
        return view("dashboard.categories.index",compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents=Category::all();
        return view('dashboard.categories.create',compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Category::rules());
        $request->merge(['slug'=>Str::slug($request->post('name'))]);
        $data=$request->except('image');
        if($request->hasFile('image'))
        {
           $file= $request->file('image');
           $path=$file->store('uploads','public');
           $data['image']=$path;

        }
        
        $category=Category::create($data);
        return Redirect::route('categories.index')->with('success','Category Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { $category=Category::findOrFail($id);
        $parents=Category::where('id','<>',$id)->whereNull('parent_id')
        ->where('parent_id','<>',$id)->get();
       
        // if(!$category)
        // {
        //     abort(404);
        // }
        return view('dashboard.categories.edit',compact('category','parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    // use custom request validation
    public function update(CategoryRequest $request, string $id)
    {
         $request->validate(Category::rules($id));
        $category=Category::find($id);
        $old_image=$category->image;
        $data=$request->except('image');
        if($request->hasFile('image'))
        {
           $file= $request->file('image');
           $path=$file->store('uploads','public');
           $data['image']=$path;

        }
        $category->update($data);
        if($old_image&& isset($data['image']))
        {
            Storage::disk('public')->delete($old_image);

        }
        return Redirect::route('categories.index')->with('success','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::find($id);
        $category->delete();
        if($category->image)
        {
            Storage::disk('public')->delete($category->image);
        }

        return Redirect::route('categories.index')->with('success','Category Delete');
    }
}

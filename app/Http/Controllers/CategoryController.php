<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CategoryResource;
use App\Model\Question;
use App\Model\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFondation\Response;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $request)
    {
        return CategoryResource::collection(category::latest()->get());
    }

 
   
    public function store(Request $request)
    {
        //Category::create($request->all());
        $category = new Category;
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();
        return response('created',\Symfony\Component\HttpFondation\Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    
    public function update(Request $request, Category $category)
    {
        //return $request->all();
        $category->update(
            [
                'name'=>$request->name,
                'slug'=>str_slug($request->name)
            ]);
            return response('Updated',Responce::HTTP_ACCEPTED);
    }

   
    public function destroy(Category $category)
    {
        $category->delete();
        return response(null,Response('Delected',HTTP_NO_CONTENT));

    }
}
?>
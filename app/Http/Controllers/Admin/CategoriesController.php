<?php

namespace bocaamerica\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use bocaamerica\Category;
use bocaamerica\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.parts.category._listCategory', compact('categories'));
    }

    public function store(Request $request)
    {
        $cateogry = new Category();
        $cateogry->slug = str_slug($request['name']);
        $cateogry->fill($request->all())->save();

        Session::flash('message', 'Categoría agregada correctamente');
        return back();
    }

    public function active($id)
    {
        $category = Category::find($id);
        $category->status = 'ACTIVE';
        $category->save();

        Session::flash('message', 'Categoría activada');
        return back();
    }

    public function desactive($id)
    {
        $category = Category::find($id);
        $category->status = 'DESACTIVE';
        $category->save();

        Session::flash('message', 'Categoría desactivada');
        return back();
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        Session::flash('message', 'Categoría eliminada correctamente');
        return back();
    }
}

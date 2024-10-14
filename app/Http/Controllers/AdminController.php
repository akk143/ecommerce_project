<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

use Flasher\Toastr\Prime\ToastrInterface;

class AdminController extends Controller
{
    public function view_category()
    {
        $datas = Category::all();

        return view('admin.category',compact('datas'));
    }

     
    public function add_category(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        $category = new Category;
        $category->category_name = $request->category;
        $category->save();


        toastr()->timeOut(5000)->closeButton()->success('Category Added Successfully.');

        return redirect()->back();
    }


    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        toastr()->timeOut(5000)->closeButton()->success('Category Deleted Successfully.');

        return redirect()->back();
    }


    public function edit_category($id)
    {
        $data = Category::find($id);

      return view('admin.edit_category',compact('data'));
    }



    public function update_category(Request $request,$id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();

        toastr()->timeOut(5000)->closeButton()->success('Category Updated Successfully.');

        return redirect('/view_category');
    }



    public function add_product()
    {
        $categories = Category::all();

        return view('admin.add_product',compact('categories'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product();
        
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;

        $image = $request->image;

        if($image){

            $imagename = time(). '.' .$image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->image = $imagename;
        }
    
        $data->save();

        toastr()->timeOut(5000)->closeButton()->success('Product Added Successfully.');
    
        return redirect()->back();
    }


    public function view_product()
    {
        $products = Product::paginate(5);

        return view('admin.view_product',compact('products'));
    }
    
    public function delete_product($id)
    {
        $datas = Product::find($id);

        $image_path = public_path('products/'.$datas->image);

        if(file_exists($image_path)){
            unlink($image_path);
        }

        $datas->delete();

        toastr()->timeOut(5000)->closeButton()->success('Product Deleted Successfully.');

        return redirect()->back();
    }


    public function update_product($id)
    {
        $datas = Product::find($id);

        $categories = Category::all();

        return view('admin.update_product',compact('datas','categories'));
    }

    public function edit_product(Request $request, $id)
    {
        $datas = Product::find($id);
        
        $datas->title = $request->title;
        $datas->description = $request->description;
        $datas->price = $request->price;
        $datas->quantity = $request->quantity;
        $datas->category = $request->category; 
        
        $image = $request->file('newimg');
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->file('newimg')->move('products', $imagename);
            $datas->image = $imagename;
        }
    
        $datas->save();

        toastr()->timeOut(5000)->closeButton()->success('Product Updated Successfully.');

        return redirect('/view_product');
    }


    public function product_search(Request $request)
    {
        $search = $request->search;

        $products = Product::where('title','LIKE','%'. $search .'%')->orWhere('category', 'LIKE', '%' . $search . '%')->paginate(2);

        return view('admin.view_product', compact('products'));
    }
    

    public function view_order()
    {
        $datas = Order::all();

        return view('admin.order',compact('datas'));
    }


    public function delivered($id)
    {
        $data = Order::find($id);

        $data->status = 'Package Delivered';
        $data->save();

        return redirect('/view_order');
    }
    
}

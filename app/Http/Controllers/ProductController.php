<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class ProductController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('merchant.product.view');
    }

   
    public function create()
    {
        return view('merchant.product.create');
    }

    public function get_subcategory(Request $request)
    {
        $category=$request->category;
        $row=DB::table('subcategories')->where('cat_id','=',$category)->get();
        
        foreach($row as $details)
        {
            echo "<option value=".$details->id.">".$details->subcategory."</option>";            
            
        }
    }
    public function get_megacategory(Request $request)
    {
        $subcat_id=$request->subcat_id;
        $row=DB::table('megacategories')->where('subcat_id','=',$subcat_id)->get();
        
        foreach($row as $details)
        {
            echo "<option value=".$details->id.">".$details->megacategory."</option>";            
            
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1000',
        ]);
        $imageName = date('Ymdhis').rand(111,999).'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('product_image'), $imageName);

        if($request->hasFile('img1'))
           {
                $validated = $request->validate([
                    'img1' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1000',
                ]);
                $img1 = date('Ymdhis').rand(111,999).'.'.request()->img1->getClientOriginalExtension();
                request()->img1->move(public_path('product_image'), $img1);
           }
           else{
            $img1="";
           }
        if($request->hasFile('img2'))
           {
                $validated = $request->validate([
                    'img2' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1000',
                ]);
                $img2 = date('Ymdhis').rand(111,999).'.'.request()->img2->getClientOriginalExtension();
                request()->img2->move(public_path('product_image'), $img2);
           }
           else{
            $img2="";
           }
        if($request->hasFile('img3'))
           {
                $validated = $request->validate([
                    'img3' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1000',
                ]);
                $img3 = date('Ymdhis').rand(111,999).'.'.request()->img3->getClientOriginalExtension();
                request()->img3->move(public_path('product_image'), $img3);
           }
           else{
            $img3="";
           }
        if($request->hasFile('img4'))
           {
                $validated = $request->validate([
                    'img4' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1000',
                ]);
                $img4 = date('Ymdhis').'.'.request()->img4->getClientOriginalExtension();
                request()->img4->move(public_path('product_image'), $img4);
           }
           else{
            $img4="";
           }


        $product=New Product;
        $product->cat_id = $request->cat_id;
        $product->subcat_id = $request->subcat_id;
        $product->megacat_id = $request->megacat_id;
        $product->merchant_id = Auth::guard('merchant')->user()->id;
        $product->title = $request->title;
        $product->main_image = $imageName;
        $product->img1 = $img1;
        $product->img2 = $img2;
        $product->img3 = $img3;
        $product->img4 = $img4;
        $product->description = $request->description;
        $product->colors = $request->colors;
        $product->active = 'YES';
        
       
        if($product->save())
        {
            $attr_type = $request->attr_type;
            $attr_value = $request->attr_value;
            $market_price = $request->market_price;
            $sale_price = $request->sale_price;
            $stock = $request->stock;
            foreach($attr_value as $key => $attr_value_details)
            {
                $array=array(
                    'product_id'=>$product->id,
                    'attr_type'=>$attr_type,
                    'attr_value'=>$attr_value_details,
                    'market_price'=>$market_price[$key],
                    'sale_price'=>$sale_price[$key],
                    'stock'=>$stock[$key]
                );

                DB::table('product_details')->insert($array);
            }
            return redirect('/merchant/product/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/merchant/product/create')->with('error', 'Something Went Wrong');
        }
    }

    
    public function show(Product $product)
    {
        //
    }

  
    public function edit(Product $product)
    {
        $count=DB::table('products')->where('id','=',$product->id)->where('merchant_id','=',Auth::guard('merchant')->user()->id)->count();
        if($count==0)
        {
            return redirect('/merchant/product/');
        }
        return view('merchant.product.update',compact('product'));
    }

    
    public function update(Request $request, Product $product)
    {
        if($request->hasFile('image'))
           {
                $validated = $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1000',
                ]);
                $imageName = date('Ymdhis').rand(111,999).'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('product_image'), $imageName);
               
                $previous_path=public_path().'/product_image/'.$request->previous_image;
                if($request->previous_image!='')
                {
                    if(File::exists($previous_path)){
                        unlink($previous_path);
                    }
                } 
           }
           else
           {
                $imageName=$request->previous_image;
           }

           if($request->hasFile('img1'))
           {
                $validated = $request->validate([
                    'img1' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1000',
                ]);
                $img1 = date('Ymdhis').rand(111,999).'.'.request()->img1->getClientOriginalExtension();
                request()->img1->move(public_path('product_image'), $img1);
               
                $previous_path=public_path().'/product_image/'.$request->previous_img1;
                if($request->previous_image!='')
                {
                    if(File::exists($previous_path)){
                        unlink($previous_path);
                    }
                } 
           }
           else
           {
                $img1=$request->previous_img1;
           }


           if($request->hasFile('img2'))
           {
                $validated = $request->validate([
                    'img2' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1000',
                ]);
                $img2 = date('Ymdhis').rand(111,999).'.'.request()->img2->getClientOriginalExtension();
                request()->img2->move(public_path('product_image'), $img2);
               
                $previous_path=public_path().'/product_image/'.$request->previous_img2;
                if($request->previous_image!='')
                {
                    if(File::exists($previous_path)){
                        unlink($previous_path);
                    }
                } 
           }
           else
           {
                $img2=$request->previous_img2;
           }

           if($request->hasFile('img3'))
           {
                $validated = $request->validate([
                    'img3' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1000',
                ]);
                $img3 = date('Ymdhis').rand(111,999).'.'.request()->img3->getClientOriginalExtension();
                request()->img3->move(public_path('product_image'), $img3);
               
                $previous_path=public_path().'/product_image/'.$request->previous_img3;
                if($request->previous_image!='')
                {
                    if(File::exists($previous_path)){
                        unlink($previous_path);
                    }
                } 
           }
           else
           {
                $img3=$request->previous_img3;
           }

           if($request->hasFile('img4'))
           {
                $validated = $request->validate([
                    'img4' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:1000',
                ]);
                $img4 = date('Ymdhis').rand(111,999).'.'.request()->img4->getClientOriginalExtension();
                request()->img4->move(public_path('product_image'), $img4);
               
                $previous_path=public_path().'/product_image/'.$request->previous_img4;
                if($request->previous_image!='')
                {
                    if(File::exists($previous_path)){
                        unlink($previous_path);
                    }
                } 
           }
           else
           {
                $img4=$request->previous_img4;
           }



        $product->cat_id = $request->cat_id;
        $product->subcat_id = $request->subcat_id;
        $product->megacat_id = $request->megacat_id;
        $product->title = $request->title;
        $product->main_image = $imageName;
        $product->img1 = $img1;
        $product->img2 = $img2;
        $product->img3 = $img3;
        $product->img4 = $img4;
        $product->description = $request->description;
        $product->colors = $request->colors;
        
       
        if($product->save())
        {
            $attr_type = $request->attr_type;
            $attr_value = $request->attr_value;
            $market_price = $request->market_price;
            $sale_price = $request->sale_price;
            $stock = $request->stock;
            $product_details_id= $request->product_details_id;
            foreach($attr_value as $key => $attr_value_details)
            {
                if($product_details_id[$key]==0)
                {
                    $array=array(
                        'product_id'=>$product->id,
                        'attr_type'=>$attr_type,
                        'attr_value'=>$attr_value_details,
                        'market_price'=>$market_price[$key],
                        'sale_price'=>$sale_price[$key],
                        'stock'=>$stock[$key]
                    );
    
                    DB::table('product_details')->insert($array);
                }
                else
                {
                    $array=array(
                        'product_id'=>$product->id,
                        'attr_type'=>$attr_type,
                        'attr_value'=>$attr_value_details,
                        'market_price'=>$market_price[$key],
                        'sale_price'=>$sale_price[$key],
                        'stock'=>$stock[$key]
                    );
    
                    DB::table('product_details')->where('id','=',$product_details_id[$key])->update($array);
                }
                
            }
            return redirect('/merchant/product/'.$product->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/merchant/product/'.$product->id.'/edit')->with('error', 'Something Went Wrong');
        }

    }

  
    public function destroy(Product $product)
    {
        $arr=array(
            'active'=>'NO'
        );
        DB::table('products')->where('id','=',$product->id)->update($arr);
        
        return redirect('/merchant/product/')->with('success', 'Deleted Successfully');
        
    }
}
<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Batch;
use App\Product;
use App\ProductBatch;

class ProductBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productbatch = ProductBatch::orderBy('product_batch.id','DESC')
                        ->join('batch', 'product_batch.batch_id', '=', 'batch.id')
                        ->join('product', 'product_batch.product_id', '=', 'product.id')
                        ->paginate(4);
        
        return view('ProductBatch.index',compact('productbatch',$productbatch))
            ->with('i', ($request->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batch = Batch::orderBy('batch.id','DESC')
                ->join('provider', 'batch.provider_id', '=', 'provider.id');
        $product = Product::orderBy('id','DESC');


        return view('PRoductBatch.create')->with('batch',$batch)->with('product',$product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'batch_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',

        ]);
        $this->total = $this->price * $this->quantity;

        ProductBatch::create($request->all())->fill(['total' => 
        $request->price * $request->quantity]);
        return redirect()->route('productbatch.index')
                        ->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $batch = Batch::find($id);
        return view('Batch.show',compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $provider = Provider::orderBy('id','name');
        $batch = Batch::find($id);
        
        return view('Batch.edit',compact('batch','provider'));
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
        $this->validate($request, [
            'provider_id' => 'required',
        ]);

        Batch::find($id)->update($request->all());
        return redirect()->route('batch.index')
                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Batch::find($id)->delete();
        return redirect()->route('batch.index')
                        ->with('success','Category deleted successfully');
    }
}

<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Batch;
use App\Provider;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $batch = Batch::orderBy('id','DESC')->paginate(4);
        $provider = Provider::orderBy('id','description');

        return view('Batch.index',compact('batch','provider'))
            ->with('i', ($request->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provider = Provider::orderBy('id','name');

        return view('Batch.create',compact('provider'));
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
            'provider_id' => 'required',
        ]);

        Batch::create($request->all());
        return redirect()->route('batch.index')
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

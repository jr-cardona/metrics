<?php

namespace App\Http\Controllers;

use App\Http\Requests\DimensionStoreRequest;
use App\Http\Requests\DimensionUpdateRequest;
use App\Models\Dimension;
use Illuminate\Http\Request;

class DimensionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dimensions = Dimension::all();

        return view('dimension.index', compact('dimensions'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dimension.create');
    }

    /**
     * @param \App\Http\Requests\DimensionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DimensionStoreRequest $request)
    {
        $dimension = Dimension::create($request->validated());

        $request->session()->flash('dimension.id', $dimension->id);

        return redirect()->route('dimension.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dimension $dimension
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Dimension $dimension)
    {
        return view('dimension.show', compact('dimension'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dimension $dimension
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Dimension $dimension)
    {
        return view('dimension.edit', compact('dimension'));
    }

    /**
     * @param \App\Http\Requests\DimensionUpdateRequest $request
     * @param \App\Models\Dimension $dimension
     * @return \Illuminate\Http\Response
     */
    public function update(DimensionUpdateRequest $request, Dimension $dimension)
    {
        $dimension->update($request->validated());

        $request->session()->flash('dimension.id', $dimension->id);

        return redirect()->route('dimension.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dimension $dimension
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Dimension $dimension)
    {
        $dimension->delete();

        return redirect()->route('dimension.index');
    }
}

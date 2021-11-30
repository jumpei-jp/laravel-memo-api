<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//---------------------------------------
//以下より追加
//---------------------------------------
use App\Http\Requests\Memo\StoreMemoRequest;
use App\Http\Requests\Memo\UpdateMemoRequest;
use App\Http\Requests\Memo\DestroyMemoRequest;
use App\Http\Requests\Memo\ShowMemoRequest;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'List Success!',
            'details' => Memo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemoRequest $request)
    {

        //バリデーションで問題が無ければ保存
        $memo = Memo::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Insert success!',
            'details' => [
                'id' => $memo->id,
                'title' => $memo->title,
                'content' => $memo->content,

            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    //public function show(Memo $memo)
    public function show(ShowMemoRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Show Success!',
            'details' => Memo::find($request['id'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit(Memo $memo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Memo $memo)
    public function update(UpdateMemoRequest $request)
    {
        //更新
        $memo = Memo::find($request['id']);
        $memo->update($request->all());

        //jsonで結果を返す。
        return response()->json([
            'success' => true,
            'mesage' => 'Update Success!',
            'details' => $request->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    //public function destroy($id)
    public function destroy(DestroyMemoRequest $request)
    {

        // 問題なければDB更新
        $memo = Memo::find($request['id']);
        $memo->delete();

        // jsonで結果を返す
        return response()->json([
            'success' => true,
            'message' => 'Delete Success!',
            'details' => $memo
        ]);
    }
}

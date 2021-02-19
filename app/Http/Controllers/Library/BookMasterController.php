<?php

namespace App\Http\Controllers\Library;

use App\Models\Book;
use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\BookMaster;
use App\Models\BookStatus;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TitleResource;
use App\Http\Resources\Books\BookAllResource;
use App\Http\Resources\Books\BookMasterResource;
use App\Http\Resources\Books\BookCategoryResource;

class BookMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['books'] = BookAllResource::collection(BookMaster::orderBy('id', 'desc')->Active()->get());
        $data['status'] =TitleResource::collection(BookStatus::orderBy('id', 'desc')->Active()->get());
        $data['category'] = TitleResource::collection(BookCategory::orderBy('id', 'desc')->Active()->get());
        return Inertia::render('Books/BookMaster', ['vans'=>$data,'urls'=>"/library/bookMasters", 'pagetitle'=>"Book Master"]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('main_image')){
            $image_name = "will do something here later on";
        }else{
            $image_name = "";
        }

        $request['created_by'] =Auth::id();
        $request['status'] =1;
        $request['edition_year'] = Carbon::parse($request->edition_year)->format('Y-m-d');
        $request['publish_year'] = Carbon::parse($request->publish_year)->format('Y-m-d');
        // $request->request->add(['image' => $image_name]);
        if($request['id']){
            $book = BookMaster::find($request['id']);
            $row = $book->update($request->all());
        }else{
            $row = BookMaster::create($request->all());
            $quantity = (int)($request['end_code'] - $request['start_code']);
            if ($row && $quantity > 0) {
                $i = (int)$request['start_code'];
                while ($i <= (int)$request['end_code']){
                    Book::create([
                        'book_master_id' => $row->id,
                        'book_code' => $request->get('code').$i,
                        'created_by' => auth()->user()->id,
                        'book_status' => $request['book_status']?$request['book_status']:1,
                    ]);
                    $i++;
                }
            }

        }
        $van = new BookAllResource($row);
        return response()->json($van);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookMaster  $bookMaster
     * @return \Illuminate\Http\Response
     */
    public function show(BookMaster $bookMaster)
    {
        $data['status'] =TitleResource::collection(BookStatus::orderBy('id', 'desc')->Active()->get());
        $data['master'] = new BookMasterResource ($bookMaster);
        return Inertia::render('Books/CurrentBook', ['vans'=>$data,'urls'=>"/library/bookMasters", 'pagetitle'=>"Book"]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookMaster  $bookMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookMaster $bookMaster)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookMaster  $bookMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookMaster $bookMaster)
    {
        //
    }
}

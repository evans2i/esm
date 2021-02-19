<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Http\Resources\Books\IssueResource;
use App\Models\Book;
use App\Models\BookIssue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
       $meber = $request->member_id;
       $books = $request->dataBooks;
       foreach ($books as $key => $data){
           if (!empty($data['book'])) {
               $checkexistance = BookIssue::where('member_id', $meber)->where('book_id', $data['book']['id'])->where('return_date',null)->first();
               if(!$checkexistance){
                $databook = Book::find($data['book']['id']);
                    BookIssue::create([
                        'member_id' => $meber,
                        'book_id' => $data['book']['id'],
                        'issued_on' => Carbon::now(),
                        'due_date' =>Carbon::now()->addDays(8),
                        'created_by' =>Auth::Id(),
                        'created_at' => Carbon::now(),
                    ]);
                    $databook->update(['book_status_id' => 2]);
               }
           }

       }
       return true;
    }

    public function storeStaff(Request $request)
    {
       $meber = $request->member_id;
       $books = $request->dataBooks;
       foreach ($books as $key => $data){
            $idadi = (int)$data['idadi'];
            $i=1;
            while($i <= $idadi) {
                    $databook = Book::where('book_status_id',1)->where('book_master_id', $data['id'])->first();
                    BookIssue::create([
                        'member_id' => $meber,
                        'book_id' => $databook->id,
                        'issued_on' => Carbon::now(),
                        'due_date' =>Carbon::now()->addMonth(),
                        'created_by' =>Auth::Id(),
                        'created_at' => Carbon::now(),
                    ]);
                    $databook->update(['book_status_id' => 2]);

                $i+=1;
            }

       }
       return true;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookIssue  $bookIssue
     * @return \Illuminate\Http\Response
     */
    public function show(BookIssue $bookIssue)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookIssue  $bookIssue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookIssue $bookIssue)
    {
        //
    }

    public function bookIssueReturn($member = null , $book = null)
    {
        $van = BookIssue::where('member_id',$member)->where('book_id',$book)->first();
        if ($van) {
            $book = Book::find($book);
            $updated = $van->update(['return_date'=>Carbon::now()]);
            $book->update(['book_status_id' => 1]);
        }
        $van = new IssueResource($van);

        return response()->json($van);
    }


}

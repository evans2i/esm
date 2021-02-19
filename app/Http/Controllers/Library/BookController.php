<?php

namespace App\Http\Controllers\Library;

use App\Http\Resources\Books\IssueResource;
use App\Http\Resources\Students\StudentResource;
use App\Http\Resources\Users\StaffResource;
use App\Models\Book;
use App\Models\LibraryMember;
use App\Models\Staff;
use Inertia\Inertia;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\BookMaster;
use App\Models\StudentBatch;
use Illuminate\Http\Request;
use App\Models\StudentStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\Books\BookResource;
use App\Http\Resources\Books\BookMasterResource;
use App\Http\Resources\Books\BookMasterSingleResource;
use App\Http\Resources\Users\StaffStudentResource;
use App\Http\Resources\Users\StudentStaffResource;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Books/BookPage',['pagetitle'=>'Book Issue']);
    }

    public function studentLibrary( $type = null)
    {
        if ($type ==="student"){
            $vans['students'] = Student::with('address','parent','guardian')->latest()->get();
            $vans['faculty'] = Faculty::get();
            $vans['batches'] =StudentBatch::get();
            $pagetitle = "Students";
        }elseif ($type === "staff"){
            $pagetitle = "Staff";
            $vans = Staff::latest()->active()->get();
        }
        return Inertia::render('Books/Student', ['vans'=>$vans,'urls'=>"library/books",'pagetitle'=>$pagetitle]);
    }


    public function studentLibraryData($student = null, $type= null)
    {
        if ($type == "Staff"){
            $van = Staff::find($student);
            $vans['member'] = new StaffResource($van);
            $data = LibraryMember::where('member_id',$student)->where('user_type', 2)->first();
        }elseif ($type == "Students"){
            $van = Student::find($student);
            $vans['member'] = new StudentResource($van);
            $data = LibraryMember::where('member_id',$student)->where('user_type', 1)->first();
        }
        if (!$data){
            if($type == "Staff"){
                $input = ['user_type'=> 2,'member_id'=> $student,'status' =>1];
                $data =  LibraryMember::create($input);
            }
            if($type == "Students"){
                $input = ['user_type'=> 1,'member_id'=> $student,'status' =>1];
                $data =  LibraryMember::create($input);
            }
        }


        $vans['issuedBooks'] = IssueResource::collection($data->libBookIssue()->where('return_date',null)->get());
        $vans['issued'] = $data->libBookIssue()->where('return_date',null)->count();
        $vans['totalBooks'] = IssueResource::collection($data->libBookIssue()->get());
        $vans['total'] = $data->libBookIssue()->count();
        $vans['libmember'] = $data;

        return Inertia::render('Books/StudentMember', ['vans'=>$vans,'urls'=>"library/books", 'pagetitle'=>$type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function findBookDetails($q)
    {
        $data=BookMasterSingleResource::collection(BookMaster::where('code', 'LIKE', '%' .$q . '%')
                                                        ->orWhere('title', 'LIKE', '%' .$q . '%')
                                                        ->orWhere('author', 'LIKE', '%' .$q . '%')
                                                        ->orWhere('isbn_number', 'LIKE', '%' .$q . '%')->Active()
                                                        ->paginate(10));
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update(['book_status_id' =>$request->book_status_id ]);
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}

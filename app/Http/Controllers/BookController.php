<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\BookRequest;
use App\Http\Requests\RentRequest;

use App\Models\User;
use App\Models\Book;
use App\Models\RentModel;
use App\Models\RentList;

use App\Events\RentEvent;
use DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $all = Book::orderBy('id', 'desc')->cursorPaginate(10);;
        $all = Book::orderBy('id', 'desc')->get();;
        $total = Book::count();

        return view('book.index', compact('all', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {


        if($request->hasFile('photo')){
           $imagePath = $request->file('photo')->store('uploads', 'public');
        }else{
           $imagePath = null;
        }

        DB::beginTransaction();

         try {
            $book = new Book();
            $book->name = $request->name;
            $book->copis = $request->copis;
            $book->available = $request->copis;
            $book->auther = $request->auther;
            $book->page = $request->page;
            $book->discription = $request->discription;
            $book->revision = $request->revision;
            $book->last_release = $request->last_release;
            $book->first_release = $request->first_release;
            $book->revision_number = $request->revision_number;
            $book->picture = $imagePath;
            $book->user_id = auth()->user()->id;
            $book->save();

            DB::commit();

            return redirect()->route('book.index')->with('message', "Book add successfully");

        } catch (\Exception $e) {

            DB::rollBack();
            throw $e;

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     

        $book = Book::find($id);
        $rent = RentList::where(['book_id' => $id, 'back_date' => null ])->get();
        
        $history = RentList::where(['book_id' => $id ])->get();


        return view('book.show', compact('book', 'rent', 'history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, string $id)
    {
        
        if($request->hasFile('photo')){
           $imagePath = $request->file('photo')->store('uploads', 'public');
        }else{
           $imagePath = null;
        }

         DB::beginTransaction();

         try {

            $book = Book::find($id);
            $book->name = $request->name;
            //$book->copis = $request->copis;
            $book->auther = $request->auther;
            $book->page = $request->page;
            $book->discription = $request->discription;
            $book->revision = $request->revision;
            $book->last_release = $request->last_release;
            $book->first_release = $request->first_release;
            $book->revision_number = $request->revision_number;
            $book->picture = $imagePath;
            $book->user_id = auth()->user()->id;
            $book->save();

            DB::commit();

            return redirect()->route('book.index')->with('message', "Book updated successfully");

        } catch (\Exception $e) {

            DB::rollBack();
            throw $e;

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
        $book = Book::find($id);
        $book->delete();
        return back();

    }

    public function quantity(Request $request){
        
        if($request->amount > 0){
            $book = Book::find($request->id);
            $book->copis = $book->copis + $request->amount;
            $book->available = $book->available + $request->amount;
            $book->save();
        }

        return true;
    }

public function rant(){

    $all = Book::where('available', '>', 1)->orderBy('id', 'desc')->get();
    return view('book.rant', compact('all'));

}
public function rant_book(Request $request){

    $book = Book::whereIn('id', $request->book_id)->get();
    $book_id = $request->book_id;

    return view('book.rant_book', compact('book', 'book_id'));

}

public function rant_book_submit(RentRequest $request){

    $rent = new RentModel();
    $rent->name = $request->name;
    $rent->phone = $request->phone;
    $rent->email = $request->email;
    $rent->address = $request->address;
    $rent->book = count($request->book_id);
    $rent->rent_date = date('Y-m-d');
    $rent->user_id = auth()->user()->id;
    $rent->save();
    $id = $rent->id;

    foreach ($request->book_id as $key => $value) {

        DB::table('rentlist')->insert(['book_id' => $value, 'rent_user_id' => $id, 'created_at' => now() ]);
        $book = Book::find($value);
        $book->available =  $book->available - $request->rent;
        $book->save();

    }
       
    event(new RentEvent($rent));

    return redirect()->route('rant')->with('message', "Book Rented successfully");

}
public function return(){

    $all = RentList::whereNull('back_date')->orderBy('id', 'desc')->get();
    return view('book.return', compact('all'));

}
public function return_book($id){

    $rent = RentList::find($id);
    $rent->back_date = date('Y-m-d');
    $rent->save();

    $book = Book::find($rent->book_id);
    $book->available =  $book->available + $rent->copis;
    $book->save();

    $user = RentModel::find($rent->rent_user_id);

    event(new RentEvent($user));
    return redirect()->route('return')->with('message', "Book return complete.");

}














}

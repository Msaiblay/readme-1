<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Language;



class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();

        return view('backend.book.list',compact('books'));
    }

    public function create()
    {

        $authors = Author::all();
        $genres = Genre::all();
        $languages = Language::all();


        return view('backend.book.new', compact('authors', 'genres', 'languages'));
        
    }

    public function store(Request $request)
    {
        $isbn = $request->isbn;
        $title = $request->title;
        $mmtitle = $request->mmtitle;
        $page = $request->page;
        $annotation = $request->annotation;
        $publishyear = $request->publishyear;
        $authorsid = $request->authorsid;
        $languagesid = $request->languagesid;

        $genresid = $request->genresid;
        $price = $request->price;
        $discount = $request->discount;
        $description = $request->description;
        $status = 0;

        if ($price) {
            $type = 1;
            $saleprice = $price;
        }else{
            $type = 0;
            $saleprice = 0;
        }

        $photo = $request->photo;

        // Photo File Upload
        $imageName = time().'.'.$photo->extension();
        $photo->move(public_path('storage/bookcover/'),$imageName);
        $photo_filepath = '/storage/bookcover/'.$imageName;

        if ($type == 0) {
            $pdf = $request->pdf;
            // Photo File Upload
            $pdfName = time().'.'.$pdf->extension();
            $pdf->move(public_path('storage/bookfile/'),$pdfName);
            $pdf_filepath = '/storage/bookfile/'.$pdfName;
        }else{
            $pdf_filepath = '';
        }
        $book = new Book();
        $book->isbn = $isbn;
        $book->title = $title;
        $book->mmtitle = $mmtitle;
        $book->coverphoto = $photo_filepath;
        $book->pages = $page;
        $book->publishyear = $publishyear;
        $book->price = $saleprice;
        $book->discount = $discount;
        $book->summary = $description;
        $book->annotation = $annotation;
        $book->type = $type;
        $book->file = $pdf_filepath;
        $book->status = $status;
        $book->author_id = $authorsid;
        $book->language_id = $languagesid;
        $book->save();
        $book->genres()->attach($genresid);
        return redirect()->route('book.index')->with('successMsg','New Book is ADDED in your data.');



    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $authors = Author::all();
        $genres = Genre::all();
        $languages = Language::all();


        return view('backend.book.edit', compact('book', 'authors', 'genres', 'languages'));
    }

    public function update(Request $request, $id)
    {
        $isbn = $request->isbn;
        $title = $request->title;
        $mmtitle = $request->mmtitle;
        $page = $request->page;
        $annotation = $request->annotation;
        $publishyear = $request->publishyear;
        $authorsid = $request->authorsid;
        $languagesid = $request->languagesid;

        $genresid = $request->genresid;
        $price = $request->price;
        $discount = $request->discount;
        $description = $request->description;
        $status = 0;

        if ($price) {
            $type = 1;
            $saleprice = $price;
        }else{
            $type = 0;
            $saleprice = 0;
        }

        $newphoto = $request->photo;
        $oldphoto = $request->oldphoto;

        if ($request->hasfile('photo')) {
            if(\File::exists(public_path($oldphoto))){
                \File::delete(public_path($oldphoto));
            }
            
            // Photo File Upload
            $imageName = time().'.'.$newphoto->extension();
            $newphoto->move(public_path('storage/bookcover/'),$imageName);
            $photo_filepath = '/storage/bookcover/'.$imageName;
        }else{
            $photo_filepath = $oldphoto;
        }

        if ($type == 0) {
            $newpdf = $request->pdf;
            $oldpdf = $request->oldpdf;

            if ($request->hasfile('pdf')) {
                // Photo File Upload
                $pdfName = time().'.'.$newpdf->extension();
                $newpdf->move(public_path('storage/bookfile/'),$pdfName);
                $pdf_filepath = '/storage/bookfile/'.$pdfName;
            }
            else{
                $pdf_filepath = $oldpdf;
            }
        }else{
            $pdf_filepath = '';
        }
        $book = Book::find($id);
        $book->isbn = $isbn;
        $book->title = $title;
        $book->mmtitle = $mmtitle;
        $book->coverphoto = $photo_filepath;
        $book->pages = $page;
        $book->publishyear = $publishyear;
        $book->price = $saleprice;
        $book->discount = $discount;
        $book->summary = $description;
        $book->annotation = $annotation;
        $book->type = $type;
        $book->file = $pdf_filepath;
        $book->status = $status;
        $book->author_id = $authorsid;
        $book->language_id = $languagesid;
        $book->save();
        $book->genres()->attach($genresid);
        return redirect()->route('book.index')->with('successMsg','New Book is ADDED in your data.');
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEbookRequest;
use App\Models\Ebook;
use Auth;
use Illuminate\Http\Request;
use Storage;

class EbookController extends Controller
{
    public function create()
    {
        return view('ebook.create');
    }

    public function save(StoreEbookRequest $request)
    {
        // dd($request);
        $ebook = new Ebook;

        $ebook->author_id = Auth::user()->id;
        $ebook->title = $request->input('title');
        $ebook->description = $request->input('description');

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('Ebook/cover/', $filename, 'public');
            $ebook->cover = $filename;
            Storage::disk('dropbox')->put('cover', $request->file('cover'));
        }

        if ($request->hasFile('ebook')) {
            $file = $request->file('ebook');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('Ebook/book/', $filename, 'public');
            $ebook->ebook = $filename;
            Storage::disk('dropbox')->put('ebook', $request->file('ebook'));
        }

        $ebook->save();
        try {
            return redirect()->route('index')->with('success', 'E-Book added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error occurred while saving the ebook.']);
        }
        // return redirect()->route('index')->with('success', 'E-Book added successfully!');
    }

    public function display()
    {
        $ebooks = Ebook::latest()->get();
        return view('ebook.display', compact('ebooks'));
    }

    public function read($id)
    {
        $ebook = Ebook::with('comments')->find($id);
        return view('ebook.read', compact('ebook'));
    }

    public function manage()
    {
        $id = Auth::user()->id;
        $ebooks = Ebook::where('author_id', $id)->orderBy('id', 'desc')->paginate(5);
        return view('ebook.manage', compact('ebooks'));
    }

    public function edit($id)
    {
        $ebook = Ebook::find($id);
        return view('ebook.displayEbook',compact('ebook'));
    }

    public function delete($id){
        $ebook=Ebook::findOrFail($id);
        Storage::delete('/public/Ebook/cover/'.$ebook->cover);
        Storage::delete('/public/Ebook/book/'.$ebook->ebook);
        Storage::disk('dropbox')->delete('cover/'. $ebook->cover);
        Storage::disk('dropbox')->delete('ebook/'. $ebook->ebook);
        $ebook->delete();
        return redirect()->back()->with('error','Post has been deeted!');
    }
    public function update($id, Request $request){
        $ebook = Ebook::find($id);

        $ebook->title = $request->newTitle;
        $ebook->description =  $request->newDescription;

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('Ebook/cover/', $filename, 'public');
            $ebook->cover = $filename;
            Storage::disk('dropbox')->put('cover', $request->file('cover'));
        }

        if ($request->hasFile('ebook')) {
            $file = $request->file('ebook');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('Ebook/book/', $filename, 'public');
            $ebook->ebook = $filename;
            Storage::disk('dropbox')->put('ebook', $request->file('ebook'));
        }
        $ebook->save();
        return redirect()->back()->with('success','Ebook has been updated!');
        // dd($request->all());
    }
}

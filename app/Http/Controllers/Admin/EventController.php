<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index() {
        $events = Event::with('category')->latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.events.create', compact('categories'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'date'        => 'required|date',
            'location'    => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'poster'      => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            
            // Pindahkan file fisik langsung ke folder public/images/posters
            $file->move(public_path('images/posters'), $nama_file); 
            
            // Simpan path bersih ini ke database
            $data['poster_path'] = 'images/posters/' . $nama_file;
        }

        Event::create($data);
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dibuat.');
    }

    public function edit(Event $event) {
        $categories = Category::all();
        return view('admin.events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, Event $event) {
        $data = $request->validate([
            'category_id' => 'required',
            'title'       => 'required',
            'description' => 'required',
            'date'        => 'required',
            'location'    => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'poster'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            // Hapus poster lama dari folder public jika ada
            if ($event->poster_path && file_exists(public_path($event->poster_path))) {
                unlink(public_path($event->poster_path));
            }

            $file = $request->file('poster');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            
            // Pindahkan file baru langsung ke folder public/images/posters
            $file->move(public_path('images/posters'), $nama_file); 
            
            $data['poster_path'] = 'images/posters/' . $nama_file;
        }

        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event) {
        if ($event->poster_path && file_exists(public_path($event->poster_path))) {
            unlink(public_path($event->poster_path));
        }
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }
}
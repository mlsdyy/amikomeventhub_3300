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
            
            // Mengatur jalur penyimpanan dinamis 
            $target_path = is_dir(base_path('../images')) ? base_path('../images/posters') : public_path('images/posters');
            
    
            $file->move($target_path, $nama_file); 
            
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
            // Tentukan jalur folder lama & baru secara dinamis
            $is_infinity = is_dir(base_path('../images'));
            $old_file_path = $is_infinity ? base_path('../' . $event->poster_path) : public_path($event->poster_path);
            $target_path = $is_infinity ? base_path('../images/posters') : public_path('images/posters');

            // Hapus poster lama jika filenya ada
            if ($event->poster_path && file_exists($old_file_path)) {
                unlink($old_file_path);
            }

            $file = $request->file('poster');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            
            // Pindahkan file baru
            $file->move($target_path, $nama_file); 
            
            $data['poster_path'] = 'images/posters/' . $nama_file;
        }

        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event) {
        $is_infinity = is_dir(base_path('../images'));
        $file_path = $is_infinity ? base_path('../' . $event->poster_path) : public_path($event->poster_path);

        if ($event->poster_path && file_exists($file_path)) {
            unlink($file_path);
        }
        
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }
}
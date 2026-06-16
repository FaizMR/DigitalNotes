<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NotesController extends Controller
{
    public function index()
    {
        try {
            // Mengambil semua data catatan (notes) milik pengguna yang sedang masuk (login) saja dari dalam database
            $note = Note::where('user_id', auth()->id())->get();
            // dd($note);
            // return response()->json(['notes' => $note], 200);
            return Inertia::render('AllNotes/Index', [
                'notes' => $note
            ]);
        } catch (\Throwable $th) {
            // Menampilkan message 'Failed to retrieve notes'
            return response()->json(['message' => 'Failed to retrieve notes'], 500);
        }
    }

    public function store(Request $request)
    {
        // Melakukan validasi terhadap data yang dikirimkan pengguna
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'string'
        ]);

        try {
            // Memasukkan data ID pengguna yang sedang masuk (login)
            $validated['user_id'] = auth()->id();

            // Menyimpan data catatan baru (note) ke dalam basis data (database)
            $note = Note::create($validated);

            // Menampilkan message 'Note create successfully' dan data dari variabel $note
            return response()->json(['message' => 'Note create successfully', 'note' => $note], 201);
        } catch (\Exception $e) {
            // Menampilkan message 'Failed to create note'
            return response()->json(['message' => 'Failed to create note'], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        // Melakukan validasi terhadap data yang dikirimkan pengguna
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'string'
        ]);

        try {
            // Mengambil semua data catatan (notes) milik pengguna yang sedang masuk (login) saja dari dalam database
            $note = Note::find($id);

            // Memasukkan data ID pengguna yang sedang masuk (login)
            $validated['user_id'] = auth()->id();

            // Menyimpan data catatan baru (note) ke dalam basis data (database)
            $notes = $note->update($validated);

            // Menampilkan message 'Note updated successfully' dan data dari variabel $note
            return response()->json(['message' => 'Note updated successfully', 'note' => $notes], 201);
        } catch (\Exception $e) {
            // Menampilkan message 'Failed to updated note'
            return response()->json(['message' => 'Failed to updated note'], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            // Mengambil semua data catatan (notes) milik pengguna berdasarkan id dari dalam database
            $note = Note::find($id);

            // Menghapus data berdasarkan id
            $note->delete();

            // Menampilkan message 'Note destroy successfully'
            return response()->json(['message' => 'Note destroy successfully'], 200);
        } catch (\Throwable $th) {
            // Menampilkan message 'Failed to destroy note'
            return response()->json(['messag' => 'Failed to destroy note'], 500);
        }
    }
}

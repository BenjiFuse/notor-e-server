<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Note;

class NotesController extends Controller
{
	// Return all notes for user
    public function index()
    {
    	$notes = Note::all();
    	return response()->json([
    		'data' => $notes
    	], 200);
    }

    // Return requested note
    public function show($id)
    {
    	$note = Note::find($id);

    	if (!$note) {
    		return response()->json([
    			'error' => [
    				'message' => 'note does not exist'
    				]
    			], 404);
    	}

		return response()->json([
			'data' => $note
		], 200);
    }

    // Save the given note if possible
    public function store(Request $request)
    {
    	if (!$request->text or !$request->user_id) {
    		return response()->json([
    			'error' => [
    				'message' => 'Note text and user_id not supplied'
    			]
			], 422);
    	}

    	$note = Note::create(['user_id' => request('user_id'), 'text' => request('text')]);	// [!] 

    	return response()->json([
    		'message' => 'Note Created Successfully!',
    		'data' => $note
    	]);
    }

    // Update a given note with new information
    public function update(Request $request, $id)
    {
    	    	if (!$request->text) {
    		return response()->json([
    			'error' => [
    				'message' => 'false and fake'
    			]
			], 422);
    	}


    	if (!$request->text or !$request->user_id) {
    		return response()->json([
    			'error' => [
    				'message' => 'Note text and user_id not supplied'
    			]
			], 422);
    	}

    	$note = Note::find($id);
    	$note->text = $request->text;
    	$note->save();

    	return response()->json([
    		'message' => 'Note Updated Successfully!'
    	]);
    }

    // Destroys the note with the given id
    public function destroy($id)
    {
    	Note::destroy($id);
    }

    // :poop:
    public function edit($id)
    {
		return response()->json([
			'error' => [
				'message' => 'NotesController@edit not implemented...'
			]
		], 422);
    }
}

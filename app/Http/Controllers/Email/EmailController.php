<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\SuccessfulEmail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emails = SuccessfulEmail::whereNull('deleted_at')->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $emails
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
        ]);

        $email = new SuccessfulEmail($request->all());
        $email->raw_text = $this->extractPlainText($email->email);
        $email->save();

        return response()->json([
            'success' => true,
            'data' => $email
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SuccessfulEmail $email)
    {
        return response()->json([
            'success' => true,
            'data' => $email
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuccessfulEmail $email)
    {
        $email->update($request->all());

        if ($request->has('email')) {
            $email->raw_text = $this->extractPlainText($email->email);
            $email->save();
        }

        return response()->json([
            'success' => true,
            'data' => $email
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuccessfulEmail $email)
    {
        $email->delete();

        return response()->json(null, 204);
    }

    // Extract the plain text only from the email.
    private function extractPlainText($emailContent)
    {
        return strip_tags($emailContent);
    }
}

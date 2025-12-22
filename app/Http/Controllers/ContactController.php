<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required',
        ]);

        $response = Http::asForm()
            ->timeout(5)
            ->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]);

        if (! $response->successful()) {
            return back()->withErrors([
                'captcha' => "Erreur lors de la vérification reCAPTCHA. Réessaie."
            ])->withInput();
        }

        $result = $response->json();

        if (! ($result['success'] ?? false)) {
            return back()->withErrors([
                'captcha' => "Veuillez confirmer que vous n’êtes pas un robot."
            ])->withInput();
        }

       
        
        $contact = ContactMessage::create([
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'ip' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 255),
        ]);

        $adminEmail = config('mail.contact_to', config('mail.from.address'));
        Mail::to($adminEmail)->send(new ContactMail([
            ...$validated,
            'id' => $contact->id,
        ]));

        return back()->with('success', 'Message envoyé avec succès');
    }
}

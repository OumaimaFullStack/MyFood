<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'date' => 'required|date',
            'heure' => 'required',
            'nombre_personne' => 'required|integer|min:1',
        ]);

        Reservation::create($request->all());

        return redirect()->back()->with('success', 'Votre réservation a été envoyée avec succès !');
    }
}

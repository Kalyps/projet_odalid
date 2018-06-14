<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Zone;
use App\Porte;
use App\Salle;
use App\Gache;
use App\Lecteur;
use App\Relais;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // Redirection vers badges
    public function badges($n) {
        $badge = Badge::where('id', $n)->first();
        return view('badgesEdit')->with('badge', $badge);
    }

    // Redirection utilisateurs
    public function utilisateurs() {
        $users = User::get();
        return view('utilisateursEdit');
    }

    // Redirection gestion zones dans infrastructure
    public function zones($n) {
        $zone = Zone::where('id', $n)->first();
        return view('zonesEdit')->with('zone', $zone);
    }

    // Redirection gestion portes dans infrastructure
    public function portes($n) {
        $porte = Porte::where('id', $n)->first();
        $salles = Salle::get();
        $gaches = Gache::get();
        $relais_entier = Relais::get();
        $relais_portes = Porte::select('relais_id')->where('id', '!=', $n)->get();
        return view('portesEdit')->with('porte', $porte)
                                 ->with('salles', $salles)
                                 ->with('relais_entier', $relais_entier)
                                 ->with('gaches', $gaches)
                                 ->with('relais_portes', $relais_portes);
    }

    // Redirection gestion salles dans infrastructure
    public function salles($n) {
        $salle = Salle::where('id', $n)->first();
        $zones = Zone::get();
        return view('sallesEdit')->with('salle', $salle)
                                 ->with('zones', $zones);
    }

    // Redirection gestion gaches dans infrastructure
    public function gaches($n) {
        $gache = Gache::where('id', $n)->first();
        return view('gachesEdit')->with('gache', $gache);
    }

    // Redirection gestion lecteurs dans infrastructure
    public function lecteurs($n) {
        $lecteur = Lecteur::where('id', $n)->first();
        $portes = Porte::get();
        $lecteur_portes = Lecteur::select('porte_id')->where('id', '!=', $n)->get();
        return view('lecteursEdit')->with('lecteur', $lecteur)
                                   ->with('portes', $portes)
                                   ->with('lecteur_portes', $lecteur_portes);
    }
}

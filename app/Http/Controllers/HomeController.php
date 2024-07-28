<?php

namespace App\Http\Controllers;

use App\Models\Dafac;
use App\Models\Daycare;
use App\Models\Kababaihan;
use App\Models\Kabataan;
use App\Models\Pwd;
use App\Models\SoloParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        $startingURL = $role == 'admin' ? "forms/" : '';

        $counts = [
            [
                'name' => 'Daycare',
                'url' => 'daycares',
                'count' => $this->countByRole(Daycare::class, $role, $id),
            ],
            [
                'name' => 'PWD',
                'url' => 'pwds',
                'count' => $this->countByRole(Pwd::class, $role, $id),
            ],
            [
                'name' => 'Solo Parent',
                'url' => 'solo_parents',
                'count' => $this->countByRole(SoloParent::class, $role, $id),
            ],
            [
                'name' => 'Kababaihan',
                'url' => 'kababaihans',
                'count' => $this->countByRole(Kababaihan::class, $role, $id),
            ],
            [
                'name' => 'Kabataan',
                'url' => 'kabataans',
                'count' => $this->countByRole(Kabataan::class, $role, $id),
            ],
            [
                'name' => 'DAFAC',
                'url' => 'dafacs',
                'count' => $this->countByRole(Dafac::class, $role, $id),
            ],
        ];

        return view('home', compact('counts', 'startingURL'));
    }

    private function countByRole($modelClass, $role, $userId)
    {
        if ($role == 'admin') {
            return $modelClass::count();
        }

        return $modelClass::where('user_id', $userId)->count();
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ListService;

class UserController extends Controller
{
    public function index() {
        $testimonials = Testimonial::all();
        $services = ListService::take(3)->get();
        return view('home', compact('testimonials', 'services'));
    }
    public function about() {
        return view('about');
    }
    public function service() {
        $services = ListService::all();
        return view('service', compact('services'));
    }
    public function booking() {
        return view('user.booking');
    }
}

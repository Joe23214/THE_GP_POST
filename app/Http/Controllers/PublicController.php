<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('welcome');
    }
    public function welcome() {
        $articles = Article::where('is_accepted',true)->orderBy('created_at','desc')->take(4)->get();        
        return view('welcome', compact('articles'));
    }
    public function careers(){
        return view('careers');
    }
    public function careersSubmit(Request $request){

        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = Auth::user();
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;
        $requestMail = new CareerRequestMail(compact('role', 'email', 'message'));
        Mail::to('admin@thegppost')->send(new CareerRequestMail(compact('role', 'email', 'message')));


        switch($role){
            case 'admin';

                $user->is_admin = NULL;
                break;

            case 'revisor';

                $user->is_revisor = NULL;
                break;

            case 'writer';

                $user->is_writer = NULL;
                break;
        }

        $user->update();

        return redirect(route('welcome'))->with('message','grazie per averci contattato');
    }
    }


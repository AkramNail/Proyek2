<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\anggota;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;


class loginController extends Controller
{

    public function index()
    {
        
        $title = 'Login akun';
        $slug = 'login akun';

        return view('User.Login.index', compact('title', 'slug'));

    }

    //Lgoin biasa
    public function login(Request $request)
    {

        $result = 
        anggota::where('email', $request->email)
            ->where('Password', $request->password)
            ->first();

        $title = 'Login akun';
        $slug = 'login akun';

        if($result){
        
            $user = anggota::where('email', $request->email)
                ->whereNull('email_verified_at')
                ->first();
        
            if($user){

                $otp = rand(10000, 99999);
                Mail::to($request->email)->send(new SendOtpMail($otp));

                anggota::where('email', $request->email)->update([
                    'otp_expires_at' => Carbon::now()->addMinutes(5),
                    'otp' => $otp
                ]);

                $dataEmail = $request->email;
                
                return view('User.Login.VerifikasiEmail.index', compact(
                    'title', 'slug', 'dataEmail'
                ));


            } else{

                $user = anggota::where('email', $request->email)->first();
                Auth::login($user);
                return view('home', compact('title', 'slug'));

            }
            
        }

        return back()
            ->withErrors(['error' => 'Email atau Password salah'])
            ->withInput();

    }

    public function membuatAkun()
    {
        
        $title = 'Membuat Akun';
        $slug = 'membuat akun';

        return view('User.Login.MembuatAkun.index', compact('title', 'slug'));

    }

    public function storeAkun(Request $request)
    {
        
        $title = 'Membuat Akun';
        $slug = 'membuat akun';
        
        //try{

            $otp = rand(10000, 99999);
            $result = anggota::insert([

                'nim' => $request->nim,
                'nama' => $request->nama,
                'email' => $request->email,
                'Password' => $request->password,
                'otp_expires_at' => Carbon::now()->addMinutes(5),
                'otp' => $otp

            ]);

            Mail::to($request->email)->send(new SendOtpMail($otp));

        /*
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        */

        $dataEmail = $request->email;
        
        return view('User.Login.VerifikasiEmail.index', 
        compact(
            'title', 'slug', 'dataEmail'
        ));
        
    }

    public function getVerifikasion(Request $request){

        $title = 'Membuat Akun';
        $slug = 'membuat akun';

        $dataEmail = $request->email;

        return view('User.Login.VerifikasiEmail.index', 
            compact(
                'title', 'slug', 'dataEmail'
            ));

    }

    public function verifikasi(Request $request)
    {
        
        $title = 'Membuat Akun';
        $slug = 'membuat akun';

        $user = anggota::where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        $dataEmail = $request->email;

        if (!$user) {
            return redirect('verifikasi')
                ->withErrors(['error' => 'OTP salah'])
                ->with('dataEmail', $dataEmail);
        }

        if (Carbon::now()->greaterThan($user->otp_expires_at)) {
            return redirect('verifikasi')
                ->withErrors(['error' => 'OTP kadaluarsa'])
                ->with('dataEmail', $dataEmail);
        }

        // sukses
        $user->email_verified_at = Carbon::now();
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        Auth::login($user);
        return redirect('home')->with('success', 'Email berhasil diverifikasi.');
    }

    public function sendVerifikasion(Request $request){


        $otp = rand(10000, 99999);
        Mail::to($request->email)->send(new SendOtpMail($otp));

        anggota::where('email', $request->email)->update([
            'otp_expires_at' => Carbon::now()->addMinutes(5),
            'otp' => $otp
        ]);


        $title = 'Membuat Akun';
        $slug = 'membuat akun';

        $dataEmail = $request->email;

        return view('User.Login.VerifikasiEmail.index', 
            compact(
                'title', 'slug', 'dataEmail'
            ));

    }

    //Ketika login menggunakan google
    public function googleLogin()
    {
        return Socialite::driver("google")->redirect();
    }

    public function googleCallback(Request $request)
    {

        $title = 'Login akun google';
        $slug = 'Login akun google';

        $googleUser = Socialite::driver("google")->user();

        $emailAda = anggota::where('email', $googleUser->email)->first();

        $idAda = anggota::where('google_id', $googleUser->id)->first();

        if($emailAda){

            if($idAda){

                anggota::where('email', $googleUser->email)->update([
                    'email_verified_at' => now()
                ]);

                $user1 = anggota::where('email', $googleUser->email)->first();

                Auth::login($user1);
                
                return redirect('home')->with('success', 'Email berhasil diverifikasi.');

            }else{

                anggota::where('email', '=', $googleUser->email)->update([

                    'google_id' => $googleUser->id,

                ]);

                $Berhasil = "yanto berhasil nambah google id";
                echo $Berhasil;
                
                $user1 = anggota::where([
                    'email' => $googleUser->email
                ])->first();

                anggota::where('email', $googleUser->email)->update([
                    'email_verified_at' => now()
                ]);

                Auth::login($user1);
                
                return redirect('home')->with('success', 'Email berhasil diverifikasi.');

            }

        }else{

            /*
            anggota::insert(
                [
                    
                    'google_id' => $googleUser->id,
                    'nim' => '1213',
                    'nama' => $googleUser->name,
                    'email' => $googleUser->email,
                    'Password' => Str::password(12)

                ]
            );
            */  

            $dataEmail = $googleUser->email;
            $dataId = $googleUser->id;
            $datPassword = Str::password(12);

            return view('User.Login.MembuatAkun.google', compact(
                'title', 'slug', 'dataEmail',
                'dataId', 'datPassword'));
        }

    }

    public function storeAkunGoogle(Request $request){

        $title = 'Login akun google';
        $slug = 'Login akun google';
        
        try{

            anggota::insert([

                'google_id' => $request->id_google,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'email' => $request->email,
                'Password' => $request->password,
                'email_verified_at' => now()

            ]);

            $user1 = anggota::where('email', $request->email)->first();

            Auth::login($user1);

            return redirect('home')->with('success', 'Email berhasil diverifikasi.');
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        

    }


}

    
<?php

namespace App\Http\Controllers;

use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\anggota;

class profilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $title = 'Profil';
        $slug = 'profil';
        
        $dataUser = Auth::user();

        return view('User/Profil.index', compact('title', 'slug', 'dataUser'));

    }

    public function logout(){

        Auth::logout();

        return redirect('/login')
        ->with('success', 'Berhasil logout');
    }

    public function sendOTP(){

        $title = 'Reset password';
        $slug = 'reset password';

        $dataEmail = Auth::user()->email;

        $otp = rand(10000, 99999);
        Mail::to($dataEmail)->send(new SendOtpMail($otp));

        anggota::where('email', $dataEmail)->update([
            'otp_expires_at' => Carbon::now()->addMinutes(5),
            'otp' => $otp
        ]);

        return view('User/Profil/OTP.index', compact('title', 'slug'));

    }

    public function resetOTP(){

        $dataEmail = Auth::user()->email;

        $otp = rand(10000, 99999);
        Mail::to($dataEmail)->send(new SendOtpMail($otp));

        anggota::where('email', $dataEmail)->update([
            'otp_expires_at' => Carbon::now()->addMinutes(5),
            'otp' => $otp
        ]);

        return redirect()->back()->with('success', 'OTP berhasil dikirim ulang');


    }

    public function verifikasiOTP(Request $request){

        $userEmail = Auth::user()->email;
        $userOTP = $request->otp;

        $user = anggota::where('email', $userEmail)
            ->where('otp', $userOTP)
            ->first();

        if (!$user) {
            return redirect('resetPassword')
                ->withErrors(['error' => 'OTP salah']);
        }

        if (Carbon::now()->greaterThan($user->otp_expires_at)) {
            return redirect('resetPassword')
                ->withErrors(['error' => 'OTP kadaluarsa']);
        }

        session(['otp_verified' => true]);

        return redirect()->route('passwordUpdate');

    }

    public function ressetPassword(){

        $title = 'Update password';
        $slug = 'update password';

        if (!session('otp_verified')) {

            return redirect('profil')
                ->with('error', 'Anda tidak memiliki akses ke halaman ini');
        }

        return view('User/Profil/ResetPassword.index', compact('title', 'slug'));

    }

    public function updatePassword(Request $request){

        $title = 'Update password';
        $slug = 'update password';

        if($request->password != $request->komfirmasiPassword){

            return redirect()->route('passwordUpdate')
                ->withErrors(['error' => 'Password tidak sama']);
        }else{

            $userEmail = Auth::user()->email;
            
            anggota::where('email', $userEmail)
                ->update([
                    'Password' => $request->password
                ]);
        }

        session(['otp_verified' => false]);

        return redirect('/profil')
        ->with('success', 'Berhasil update password');

    }

    public function editProfil(){

        $title = 'Edit profil';
        $slug = 'edit profil';

        $dataUser = Auth::user();

        return view('User/Profil/Edit.index', compact('title', 'slug', 'dataUser'));

    }

    public function storeProfil(Request $request){

        $title = 'Edit profil';
        $slug = 'edit profil';

        $idUser = Auth::user()->id;

        anggota::where('id', $idUser)->
            update([
                'nim' => $request->nim,
                'nama'=> $request->nama
            ]);

        return redirect('/profil')
        ->with('success', 'Berhasil update profil');

    }

}

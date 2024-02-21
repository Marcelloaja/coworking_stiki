<?php

namespace App\Http\Controllers;

use App\Models\UserStiki;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Notifications\RegistrationNotification;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view ('register');
    }

    public function register(Request $req)
    {
        // Validasi input
        $req->validate([
            'nama' => 'required',
            'nrp' => 'required',
            'email' => 'required|email',
            'skill' => 'required',
        ]);

        // // Code untuk mengirim notifikasi berisi QR/ID ke email
        // $qrCode = QrCode::format ('png')->size(500)->generate($req->input()['nrp']);
        // $qrCode = QrCode::size(300)->generate($userDataJson);

        // // Ambil nama dari input
        // $nama = $req->input()['nama'];
        // // Ambil tiga karakter pertama dari nama depan
        // $namaPertama = substr($nama, 0, 3);
        // // Ambil tiga karakter pertama dari nama belakang
        // $namaTerakhir = substr(strrchr($nama, ' '), 1, 3);
        
        // Gabungkan tiga karakter pertama dari nama depan dan nama belakang
        // $kodeUnik = strtoupper($namaPertama . $namaTerakhir);

        // Generate unique user ID dengan tambahan tiga angka unik di belakang kode unik
        $userId = uniqid();

        // Data user
        $userData = [
            'nama'     => $req->input('nama'),
            'nrp'      => $req->input('nrp'),
            'email'    => $req->input('email'),
            'skill'    => $req->input('skill'),
        ];

        // Encode data user menjadi format JSON
        $userDataJson = json_encode($userData);

        // Generate QR Code dari data JSON
        $qrCode = QrCode::size(300)->generate($userDataJson);

        $data = [
            'nama'     => $userData['nama'],
            'nrp'      => $userData['nrp'],
            'email'    => $userData['email'],
            'skill'    => $userData['skill'],
            'qr_code'  => $qrCode,
            'user_id'  => $userId
        ];

        // Membuat instance validator
        $validator = Validator::make($data, [
            'nama' => 'required',
            'nrp' => 'required',
            'email' => 'required|email',
            'skill' => 'required',
        ]);

        // Jika validasi gagal, kembali dengan pesan error
        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator)->withInput();
        }
        
        $userStiki = UserStiki::create($data);

        // Set variabel $email
        $email = $userData['email'];

        // Send email notification with QR Code and ID
        $userStiki->notify(new RegistrationNotification($qrCode, $userId));

        return view('success', compact('email'));
    }    
}
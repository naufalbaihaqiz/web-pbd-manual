<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Auth extends BaseController
{
    public function login()
    {
        $session = session();
        $model = new PenggunaModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->find($email);

        if ($user) {
            // Cek apakah password yang diketik cocok dengan hash di database
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'email_pengguna' => $user['email_pengguna'],
                    'isLoggedIn'     => true
                ]);
                return redirect()->back()->with('login_success', 'Berhasil login!');
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }
    }

    public function register()
    {
        $model = new PenggunaModel();

        // Aturan validasi (email harus unik, password minimal 6 karakter, dll)
        $rules = [
            'email'            => 'required|valid_email|is_unique[Pengguna.email_pengguna]',
            'password'         => 'required|min_length[6]',
            'confirm_password' => 'matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Gagal mendaftar. Pastikan email belum digunakan dan konfirmasi password cocok.');
        }

        // untuk login pakain email dan password saja jadi yang lain kosongin aja dulu ges
        $model->insert([
            'email_pengguna' => $this->request->getPost('email'),
            'password'       => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_depan'     => '',
            'nama_belakang'  => '',
            'company'        => '',
            'country'        => '',
            'jalan'          => '',
            'detail_alamat'  => '',
            'kota'           => '',
            'provinsi'       => '',
            'kode_pos'       => '',
            'no_telp'        => ''
        ]);

        return redirect()->back()->with('success', 'Registrasi berhasil! Silakan login dengan akun baru Anda.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
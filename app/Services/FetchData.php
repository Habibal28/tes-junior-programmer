<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Status;
use Carbon\Carbon;

class FetchData
{
    public function fetch()
    {
        $initResponse = Http::asForm()->post(
            'https://recruitment.fastprint.co.id/tes/api_tes_programmer',
            [
                'username' => 'dummy',
                'password' => 'dummy',
            ]
        );
        $rawUsername = $initResponse->header('X-Credentials-Username');
        $serverUsername = trim(explode(' ', $rawUsername)[0]);
        $serverDate     = $initResponse->header('Date');
        $now = Carbon::createFromFormat(
            'D, d M Y H:i:s T',
            $serverDate,
            'UTC'
        );

        $day   = $now->format('d');
        $month = $now->format('m');
        $year  = $now->format('y');

        $username = $serverUsername;
        $password = md5("bisacoding-{$day}-{$month}-{$year}");
        $response = Http::asForm()->post(
            'https://recruitment.fastprint.co.id/tes/api_tes_programmer',
            [
                'username' => $username,
                'password' => $password
            ]
        );
        
        $data = $response->json('data');

        foreach ($data as $item) {
            $kategori = Kategori::firstOrCreate([
                'nama_kategori' => $item['kategori']
            ]);

            $status = Status::firstOrCreate([
                'nama_status' => $item['status']
            ]);

            Produk::updateOrCreate(
                ['id_produk' => $item['id_produk']],
                [
                    'nama_produk' => $item['nama_produk'],
                    'harga'       => (int) $item['harga'],
                    'kategori_id' => $kategori->id_kategori,
                    'status_id'   => $status->id_status
                ]
            );
        }

        return count($data);
    }
}
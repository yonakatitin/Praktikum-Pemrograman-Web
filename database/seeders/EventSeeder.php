<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    
    public function run(): void
    {
        $events = [
            [
               'nama_event'=>'Konser Langit Benderang',
               'lokasi'=>'Stadion Manahan',
               'tgl'=>'2023-07-11',
               'gambar'=>'basdat.jpg',
            ],
            [
               'nama_event'=>'Lomba Debat',
               'lokasi'=>'UNS',
               'tgl'=>'2023-07-10',
               'gambar'=>'daa.jpg',
            ],
        ];
    
        foreach ($events as $key => $event) {
            Event::create($event);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\LazyCollection;

class FrontuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::disableQueryLog();
        LazyCollection::make(function () {
            $handle = fopen(public_path('Custom-user.csv'), 'r');
            while (($line = fgetcsv($handle, 4096)) != false) {
                $dataString = implode(', ', $line);
                $row = explode(',', $dataString);
                yield $row;
            }
            fclose($handle);
        })
            ->skip(1)
            ->chunk(1000)
            ->each(function (LazyCollection $chunk) {
                $records = $chunk->map(function ($row) {
                    return [
                        'org_id' => $row[1],
                        'name' => $row[2],
                        'website' => $row[3],
                        'country' => $row[4],
                        'description' => $row[5],
                        'founded' => $row[6],
                        'industry' => $row[7],
                        'employee' => $row[8],
                    ];
                })->toArray();

                DB::table('frontuser')->insert($records);
            });
    }
}

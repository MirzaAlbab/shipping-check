<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch provinces from the remote JSON file
        $client = new \GuzzleHttp\Client();
        $fetch = $client->getAsync('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
            ->then(
                function ($response) {
                    return json_decode($response->getBody()->getContents(), true);
                },
                function ($exception) {
                    // Handle the exception if the request fails
                    echo "Failed to fetch provinces: " . $exception->getMessage();
                    return [];
                }
            );
        $provinces = $fetch->wait();
        // Insert provinces into the database
        foreach ($provinces as $province) {
            Province::updateOrCreate(
                ['code' => $province['id']],
                ['name' => $province['name']]
            );
            $cities = $client->getAsync('emsifa.github.io/api-wilayah-indonesia/api/regencies/'.$province['id'].'.json')
                ->then(
                    function ($response) {
                        return json_decode($response->getBody()->getContents(), true);
                    },
                    function ($exception) {
                        // Handle the exception if the request fails
                        echo "Failed to fetch cities: " . $exception->getMessage();
                        return [];
                    }
                );
            $cities = $cities->wait();
            // Insert cities into the database
            foreach ($cities as $city) {
                City::updateOrCreate(
                    ['code' => $city['id']],
                    [
                        'name' => $city['name'],
                        'province_id' => Province::where('code', $province['id'])->first()->id
                    ]
                );
            }
        }
        echo "Provinces and cities seeded successfully.\n";   
    }
}

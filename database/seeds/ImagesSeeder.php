<?php

use Illuminate\Database\Seeder;
use App\Config;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = Config::create([
            'dashboard' => 'https://creato-studio.s3.us-east-2.amazonaws.com/creatoStudio/5719d7acbf0b2c5a77e32dd107444f8a.png',
            'welcome' => 'http://bodasytradiciones.com/wp-content/uploads/2015/03/bodas-tradiciones-banner-2-1024x296.jpg', 
            'tables' => 'https://creato-studio.s3.us-east-2.amazonaws.com/creatoStudio/5719d7acbf0b2c5a77e32dd107444f8a.png', 
            'index' => 'https://creato-studio.s3.us-east-2.amazonaws.com/creatoStudio/71907b2fd9703aac01a424d863a6f5a6.png', 
            'nosotros1' => 'https://creato-studio.s3.us-east-2.amazonaws.com/creatoStudio/b809c0892bd19d49374993b0dcadd83b.png', 
            'nosotros2' => 'https://creato-studio.s3.us-east-2.amazonaws.com/creatoStudio/5afaa099deda26898f0f9af664eb2614.png', 
            'nosotros3' => 'https://creato-studio.s3.us-east-2.amazonaws.com/creatoStudio/8da03a3bd7f31749f0677d2e9ffc3818.png', 
            'nosotros4' => 'https://creato-studio.s3.us-east-2.amazonaws.com/creatoStudio/a945994fcaba62807da1171b652fe4e4.png', 
            'contact' => 'https://creato-studio.s3.us-east-2.amazonaws.com/creatoStudio/e5dd571aa77668278a4893ebf244995e.png', 
            'otro' => 'vacio',
            'color' => '#E7D5CD'
        ]);
    }
}

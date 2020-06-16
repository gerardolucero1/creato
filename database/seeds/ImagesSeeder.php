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
            'dashboard' => 'http://www.losestelares.com.mx/wp-content/uploads/2016/07/Organizacion-de-boda-3-2.jpg',
            'welcome' => 'https://www.alcaidesaeventos.com/images/cabecera/slide/alcaidesa-eventos-terraza-bodas-04.jpg', 
            'tables' => 'https://creato-studio.s3.us-east-2.amazonaws.com/creatoStudio/16d9b4ec65a4600fb6a78f8fba87431f.jpeg', 
            'index' => 'https://creato-studio.s3.us-east-2.amazonaws.com/creatoStudio/dbb918919ef10319f51d1ec2f484b71f.webp', 
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

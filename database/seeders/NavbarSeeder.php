<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\Navbar;
  
class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            [
                'name' => 'Products',
                'route' => 'products.index',
                'ordering' => 1,
            ],
            [
                'name' => 'File Manager',
                'route' => 'file-manager.index',
                'ordering' => 2,
            ],
            [
                'name' => 'API Info',
                'route' => 'l5-swagger.default.api',
                'ordering' => 3,
            ]
        ];
  
        foreach ($links as $key => $navbar) {
            Navbar::create($navbar);
        }
    }
}
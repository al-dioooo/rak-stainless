<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'Work Table',
                'slug' => 'work-table',
                'pict' => 'work-table.jpg'
            ],
            [
                'name' => 'Exhaust Hood and Accessories',
                'slug' => 'exhaust-hood-and-accessories',
                'pict' => 'exhaust-hood-and-accessories.jpg'
            ],
            [
                'name' => 'Sink',
                'slug' => 'sink',
                'pict' => 'sink.jpg'
            ],
            [
                'name' => 'Kwali Range',
                'slug' => 'kwali-range',
                'pict' => 'kwali-range.jpg'
            ],
            [
                'name' => 'Stove',
                'slug' => 'stove',
                'pict' => 'stove.jpg'
            ],
            [
                'name' => 'Cabinet',
                'slug' => 'cabinet',
                'pict' => 'cabinet.jpg'
            ],
            [
                'name' => 'Sauce Condiment Pan',
                'slug' => 'sauce-condiment-pan',
                'pict' => 'sauce-condiment-pan.jpg'
            ],
            [
                'name' => 'Cocktail Station and Ice Bin',
                'slug' => 'cocktail-station-and-ice-bin',
                'pict' => 'cocktail-station-and-ice-bin.jpg'
            ],
            [
                'name' => 'Solid and Sloted Rack',
                'slug' => 'solid-and-sloted-rack',
                'pict' => 'solid-and-sloted-rack.jpg'
            ],
        ];
        $product = [
            [
                'name' => 'Oven Shelf',
                'category_id' => 1,
                'price' => 1100000,
                'weight' => 5.2,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>2 Overshelf / Ambalan</li>
                <li>Penguat Kaki Menggunakan Pipa 1 inch</li>
                <li>Dimensi 1450&times;300&times;700</li>
                </ul>',
                'pict' => 'oven-shelf.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Oven Shelf',
                'slug' => 'oven-shelf',
                'meta_desc' => 'Beli Oven Shelf Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Meja Undershelf 2 Susun with Over Shelf',
                'category_id' => 1,
                'price' => 4000000,
                'weight' => 5.5,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>2 Overshelf / Ambalan</li>
                <li>Penguat Kaki Menggunakan Pipa 1 inch</li>
                <li>Dimensi 1450&times;300&times;700</li>
                </ul>
                <p>&nbsp;</p>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top Table 1,2 mm</li>
                <li>Ketebalan Undershelf / Ambalan 1 mm</li>
                <li>4 Kaki Meja Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1500&times;750&times;850</li>
                </ul>',
                'pict' => 'meja-undershelf-2-susun-with-over-shelf.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Meja Undershelf 2 Susun with Over Shelf',
                'slug' => 'meja-undershelf-2-susun-with-over-shelf',
                'meta_desc' => 'Beli Meja Undershelf 2 Susun dengan Over Shelf Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Meja with Cross',
                'category_id' => 1,
                'price' => 2000000,
                'weight' => 5.5,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top Table 1,2 mm</li>
                <li>4 Kaki Meja Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Penguat Kaki Menggunakan Pipa 1 inch</li>
                <li>Dimensi 1500&times;700&times;850</li>
                </ul>',
                'pict' => 'meja-with-cross.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Meja with Cross',
                'slug' => 'meja-with-cross',
                'meta_desc' => 'Beli Meja dengan Cross Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Meja Undershelf 2 Susun',
                'category_id' => 1,
                'price' => 2600000,
                'weight' => 5.5,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top Table 1,2 mm</li>
                <li>Ketebalan Undershelf / Ambalan 1 mm</li>
                <li>4 Kaki Meja Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1500&times;700&times;850</li>
                </ul>',
                'pict' => 'meja-undershelf-2-susun.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Meja Undershelf 2 Susun',
                'slug' => 'meja-undershelf-2-susun',
                'meta_desc' => 'Beli Meja Undershelf 2 Susun Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Meja Middle Shelf 3 Susun',
                'category_id' => 1,
                'price' => 3550000,
                'weight' => 5.5,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top Table 1,2 mm</li>
                <li>Ketebalan Middle Shelf / Ambalan Tengah 1 mm</li>
                <li>Ketebalan Under Shelf / Ambalan 1 mm</li>
                <li>4 Kaki Meja Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1500&times;700&times;850</li>
                </ul>',
                'pict' => 'meja-middle-shelf-3-susun.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Meja Middle Shelf 3 Susun',
                'slug' => 'meja-middle-shelf-3-susun',
                'meta_desc' => 'Beli Meja Middle Shelf 3 Susun Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Exhaust Hood Type 1',
                'category_id' => 2,
                'price' => 3500000,
                'weight' => 3,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Cover Hood 0,8/1 mm</li>
                <li>Box Oil</li>
                <li>Dimensi / Meter 1000&times;1000&times;600</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'exhaust-hood-type-1.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Exhaust Hood Type 1',
                'slug' => 'exhaust-hood-type-1',
                'meta_desc' => 'Beli Exhaust Hood Type 1 Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Exhaust Hood Type 2',
                'category_id' => 2,
                'price' => 3500000,
                'weight' => 3,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Cover Hood 0,8/1 mm</li>
                <li>Box Oil</li>
                <li>Dimensi / Meter 1000&times;1000&times;600</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'exhaust-hood-type-2.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Exhaust Hood Type 2',
                'slug' => 'exhaust-hood-type-2',
                'meta_desc' => 'Beli Exhaust Hood Type 2 Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Filter Exhaust Hood',
                'category_id' => 2,
                'price' => 150000,
                'weight' => 3,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Aluminium / Stainless Steel</li>
                <li>Dimensi 500&times;500&times;50</li>
                </ul>',
                'pict' => 'filter-exhaust-hood.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Filter Exhaust Hood',
                'slug' => 'filter-exhaust-hood',
                'meta_desc' => 'Beli Filter Exhaust Hood Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Fan Exhaust Hood',
                'category_id' => 2,
                'price' => 2200000,
                'weight' => 1.2,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Aluminium / Stainless Steel</li>
                <li>Dimensi 500&times;500&times;50</li>
                </ul>',
                'pict' => 'fan-exhaust-hood.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Fan Exhaust Hood',
                'slug' => 'fan-exhaust-hood',
                'meta_desc' => 'Beli Fan Exhaust Hood Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Single Sink',
                'category_id' => 3,
                'price' => 2000000,
                'weight' => 6.5,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Keran / Faucet Standard</li>
                <li>Splash Back 10 cm</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Shelf 1 mm</li>
                <li>Dimensi Kedalamaan Bowl 450&times;500&times;300</li>
                <li>4 Kaki Rak Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 600&times;600&times;850</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'single-sink.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Single Sink',
                'slug' => 'single-sink',
                'meta_desc' => 'Beli Single Sink Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Double Sink',
                'category_id' => 3,
                'price' => 3500000,
                'weight' => 7,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Keran / Faucet Standard</li>
                <li>Splash Back 10 cm</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Shelf 1 mm</li>
                <li>Dimensi Kedalamaan Bowl 500&times;500&times;300&times;2</li>
                <li>4 Kaki Rak Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1500&times;750&times;850</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'double-sink.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Double Sink',
                'slug' => 'double-sink',
                'meta_desc' => 'Beli Double Sink Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Triple Sink',
                'category_id' => 3,
                'price' => 4500000,
                'weight' => 7.5,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Keran / Faucet Standard</li>
                <li>Splash Back 10 cm</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Shelf 1 mm</li>
                <li>Dimensi Kedalamaan Bowl 500&times;500&times;300&times;2</li>
                <li>4 Kaki Rak Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1800&times;750&times;850</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'triple-sink.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Triple Sink',
                'slug' => 'triple-sink',
                'meta_desc' => 'Beli Triple Sink Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Single Sink with Table',
                'category_id' => 3,
                'price' => 3500000,
                'weight' => 7,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Keran / Faucet Standard</li>
                <li>Splash Back 10 cm</li>
                <li>With Table</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Shelf 1 mm</li>
                <li>Dimensi Kedalamaan Bowl 500&times;500&times;300</li>
                <li>4 Kaki Rak Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1000&times;750&times;850</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'single-sink-with-table.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Single Sink with Table',
                'slug' => 'single-sink-with-table',
                'meta_desc' => 'Beli Single Sink dengan Table Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Double Sink with Table',
                'category_id' => 3,
                'price' => 5000000,
                'weight' => 7.5,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Keran / Faucet Standard</li>
                <li>Splash Back 10 cm</li>
                <li>With Table</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Shelf 1 mm</li>
                <li>Dimensi Kedalamaan Bowl 500&times;500&times;300</li>
                <li>4 Kaki Rak Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1000&times;750&times;850</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'double-sink-with-table.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Double Sink with Table',
                'slug' => 'double-sink-with-table',
                'meta_desc' => 'Beli Double Sink dengan Table Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Single Sink with Table and Cabinet',
                'category_id' => 3,
                'price' => 0,
                'weight' => 8,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Splash Back 10 cm</li>
                <li>With Table</li>
                <li>Tipe Hairline F4</li>
                <li>Sliding Door Body Cover 1 mm</li>
                <li>Ketebalan Shelf 1 mm</li>
                <li>Dimensi Kedalamaan Bowl 500&times;500&times;300</li>
                <li>4 Kaki Rak Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1000&times;750&times;850</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'single-sink-with-table-and-cabinet.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Single Sink with Table and Cabinet',
                'slug' => 'single-sink-with-table-and-cabinet',
                'meta_desc' => 'Beli Single Sink dengan Table dan Cabinet Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Kwali Range 1 Tungku / Burner',
                'category_id' => 4,
                'price' => 5500000,
                'weight' => 20,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top 1,5 mm</li>
                <li>High Pressure</li>
                <li>Tungku Bahan dari Cetakan Cor</li>
                <li>Kran Semi-Otomatis</li>
                <li>Valve On / Off Merk <strong>KRANZ</strong> with Pilot</li>
                <li>Valve Air Pendingin Top Kwali Range</li>
                <li>4 Kaki Meja 2 inch Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Penguat Kaki Menggunakan Pipa 1 inch</li>
                <li>Splash Back 500 mm</li>
                <li>Dimensi 750&times;850&times;700/1200 mm</li>
                </ul>',
                'pict' => 'kwali-range-1-tungku.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Kwali Range 1 Tungku / Burner',
                'slug' => 'kwali-range-1-tungku',
                'meta_desc' => 'Beli Kwali Range 1 Tungku / Burner Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Kwali Range 2 Tungku / Burner',
                'category_id' => 4,
                'price' => 9500000,
                'weight' => 22,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top 1,5 mm</li>
                <li>High Pressure</li>
                <li>Tungku Bahan dari Cetakan Cor</li>
                <li>Kran Semi-Otomatis</li>
                <li>Valve On / Off Merk <strong>KRANZ</strong> with Pilot</li>
                <li>Valve Air Pendingin Top Kwali Range</li>
                <li>4 Kaki Meja 2 inch Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Penguat Kaki Menggunakan Pipa 1 inch</li>
                <li>Splash Back 500 mm</li>
                <li>Dimensi 750&times;850&times;700/1200 mm</li>
                </ul>',
                'pict' => 'kwali-range-2-tungku.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Kwali Range 2 Tungku / Burner',
                'slug' => 'kwali-range-2-tungku',
                'meta_desc' => 'Beli Kwali Range 2 Tungku / Burner Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Kompor Mawar',
                'category_id' => 5,
                'price' => 4300000,
                'weight' => 7,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top 1,2 mm</li>
                <li>Under Shelf / Ambalan Sloted</li>
                <li>4 Kaki Meja 1-5 inch Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Penguat Kaki Menggunakan Pipa 1 inch</li>
                <li>Splash Back 400 mm</li>
                <li>Dimensi 1200&times;750&times;700/1200 mm</li>
                </ul>',
                'pict' => 'kompor-mawar.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Kompor Mawar',
                'slug' => 'kompor-mawar',
                'meta_desc' => 'Beli Kompor Mawar Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Stove Pot Range',
                'category_id' => 5,
                'price' => 2500000,
                'weight' => 7.4,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top 1,2 mm</li>
                <li>Tungku Menggunakan Bahan Besi Full</li>
                <li>Burner High Pressure</li>
                <li>4 Kaki Hollow Stainless 4&times;4 Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Penguat Kaki Menggunakan Pipa 1 inch</li>
                <li>Dimensi 500&times;500&times;600 cm</li>
                </ul>',
                'pict' => 'stove-pot-range.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Stove Pot Range',
                'slug' => 'stove-pot-range',
                'meta_desc' => 'Beli Stove Pot Range Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Gas Rice Cooker',
                'category_id' => 5,
                'price' => 0,
                'weight' => 4,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Capacity 10 liter</li>
                <li>Automatic Flame Out Safety</li>
                <li>Direct-fired Cooking</li>
                <li>LPG-NG</li>
                <li>Low Pressure</li>
                <li>Dimensi 530&times;480&times;450</li>
                </ul>',
                'pict' => 'gas-rice-cooker.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Gas Rice Cooker',
                'slug' => 'gas-rice-cooker',
                'meta_desc' => 'Beli Gas Rice Cooker Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Stove 4 Burner Low Pressure',
                'category_id' => 5,
                'price' => 9000000,
                'weight' => 12,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top 1 mm</li>
                <li>Tungku Cetakan Coran Berkualitas</li>
                <li>Gas</li>
                <li>4 Burner Low Pressure</li>
                <li>4 Knop On / Off</li>
                <li>2 Knop Pilot</li>
                <li>Under Shelf / Ambalan / Cross</li>
                <li>4 Kaki Meja 2 inch Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Splash Back 100 mm</li>
                <li>Dimensi 600&times;750&times;850 mm</li>
                </ul>',
                'pict' => 'stove-4-burner-low-pressure.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Stove 4 Burner Low Pressure',
                'slug' => 'stove-4-burner-low-pressure',
                'meta_desc' => 'Beli Stove 4 Burner Low Pressure Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Stove 4 Burner Low Pressure with Oven',
                'category_id' => 5,
                'price' => 30000000,
                'weight' => 17,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Cover 1 mm</li>
                <li>Tungku Cetakan Coran Berkualitas</li>
                <li>Gas</li>
                <li>Oven</li>
                <li>4 Burner Low Pressure</li>
                <li>4 Knop On / Off</li>
                <li>2 Knop Pilot</li>
                <li>Under Shelf / Ambalan / Cross</li>
                <li>4 Kaki Meja 2 inch Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Splash Back 100 mm</li>
                <li>Dimensi 700&times;750&times;850 mm</li>
                <li>Dimensi Ruang Oven 560&times;600&times;270 mm</li>
                </ul>',
                'pict' => 'stove-4-burner-low-pressure-with-oven.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Stove 4 Burner Low Pressure with Oven',
                'slug' => 'stove-4-burner-low-pressure-with-oven',
                'meta_desc' => 'Beli Stove 4 Burner Low Pressure dengan Oven Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Open Cabinet',
                'category_id' => 6,
                'price' => 5000000,
                'weight' => 3.5,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top Table 1,2 mm</li>
                <li>Ketebalan Middle Shelf / Ambalan Tengah 1 mm</li>
                <li>Ketebalan Under Shelf / Ambalan 1 mm</li>
                <li>Ketebalan Cover Cabinet 1 mm</li>
                <li>4 Kaki Meja Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1500&times;750&times;850</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'open-cabinet.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Open Cabinet',
                'slug' => 'open-cabinet',
                'meta_desc' => 'Beli Open Cabinet Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Cabinet Swing Door',
                'category_id' => 6,
                'price' => 5000000,
                'weight' => 3.7,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top Table 1,2 mm</li>
                <li>Ketebalan Middle Shelf / Ambalan Tengah 1 mm</li>
                <li>Ketebalan Under Shelf / Ambalan 1 mm</li>
                <li>Ketebalan Cover Cabinet 1 mm</li>
                <li>4 Kaki Meja Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1500&times;750&times;850</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'cabinet-swing-door.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Cabinet Swing Door',
                'slug' => 'cabinet-swing-door',
                'meta_desc' => 'Beli Cabinet Swing Door Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Cabinet Sliding Door',
                'category_id' => 6,
                'price' => 6000000,
                'weight' => 4,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top Table 1,2 mm</li>
                <li>Ketebalan Middle Shelf / Ambalan Tengah 1 mm</li>
                <li>Ketebalan Under Shelf / Ambalan 1 mm</li>
                <li>Ketebalan Cover Cabinet 1 mm</li>
                <li>Sliding Door with Key Cabinet</li>
                <li>4 Kaki Meja Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1500&times;750&times;850</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'cabinet-sliding-door.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Cabinet Sliding Door',
                'slug' => 'cabinet-sliding-door',
                'meta_desc' => 'Beli Cabinet Sliding Door Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Wall Cabinet Sliding Door',
                'category_id' => 6,
                'price' => 5000000,
                'weight' => 4,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Top Table 1,2 mm</li>
                <li>Ketebalan Middle Shelf / Ambalan Tengah 1 mm</li>
                <li>Ketebalan Under Shelf / Ambalan 1 mm</li>
                <li>Ketebalan Cover Cabinet 1 mm</li>
                <li>Sliding Door with Key Cabinet</li>
                <li>4 Lubang untuk Pemasangan ke Dinding Menggunakan Dinabol</li>
                <li>Dimensi 1500&times;450&times;850</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'wall-cabinet-sliding-door.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Wall Cabinet Sliding Door',
                'slug' => 'wall-cabinet-sliding-door',
                'meta_desc' => 'Beli Wall Cabinet Sliding Door Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Sauce Condiment Pan',
                'category_id' => 7,
                'price' => 0,
                'weight' => 5,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Body Stainless Steel</li>
                <li>Mekanis Pompa Buatan USA</li>
                <li>Kapasitas 1 Bowl</li>
                <li>Dimensi 350&times;200&times;165</li>
                </ul>',
                'pict' => 'sauce-condiment-pan.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Sauce Condiment Pan',
                'slug' => 'sauce-condiment-pan',
                'meta_desc' => 'Beli Sauce Condiment Pan Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Sauce Condiment Pan 2',
                'category_id' => 7,
                'price' => 0,
                'weight' => 5,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Body Stainless Steel</li>
                <li>Mekanis Pompa Buatan USA</li>
                <li>Kapasitas 1 Bowl</li>
                <li>Dimensi 700&times;200&times;165</li>
                </ul>',
                'pict' => 'sauce-condiment-pan-2.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Sauce Condiment Pan 2',
                'slug' => 'sauce-condiment-pan-2',
                'meta_desc' => 'Beli Sauce Condiment Pan 2 Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Cocktail Station',
                'category_id' => 8,
                'price' => 6500000,
                'weight' => 12,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ice Bin</li>
                <li>4 Kaki Meja Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Penguat Kaki Menggunakan Pipa 1 inch</li>
                <li>Dimensi Sink 300&times;300&times;200</li>
                <li>Dimensi 1400&times;750&times;50</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'cocktail-station.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Cocktail Station',
                'slug' => 'cocktail-station',
                'meta_desc' => 'Beli Cocktail Station Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Ice Bin',
                'category_id' => 8,
                'price' => 260000,
                'weight' => 7,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ice Bin</li>
                <li>4 Kaki Meja Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Penguat Kaki Menggunakan Pipa 1 inch</li>
                <li>Dimensi Sink 800&times;500&times;250</li>
                <li>Dimensi 1000&times;600&times;850</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'ice-bin.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Ice Bin',
                'slug' => 'ice-bin',
                'meta_desc' => 'Beli Ice Bin Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Glass Hanger',
                'category_id' => 8,
                'price' => 100000,
                'weight' => 3,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Route Stainless Steel</li>
                <li>Dimensi 1000&times;600&times;850</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'glass-hanger.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Glass Hanger',
                'slug' => 'glass-hanger',
                'meta_desc' => 'Beli Glass Hanger Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Solid Rack 4 Tiers',
                'category_id' => 9,
                'price' => 4000000,
                'weight' => 8,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Shelf 1 mm</li>
                <li>4 Tier / Susun</li>
                <li>4 Kaki Rak Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1500&times;550&times;1550</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'solid-rack-4-tiers.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Solid Rack 4 Tiers',
                'slug' => 'solid-rack-4-tiers',
                'meta_desc' => 'Beli Solid Rack 4 Tiers Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
            [
                'name' => 'Sloted Rack 4 Tiers',
                'category_id' => 9,
                'price' => 3000000,
                'weight' => 7.7,
                'stock' => 10,
                'description' => '<h2>Spesifikasi</h2>
                <ul>
                <li>Plat Stainless Steel 201</li>
                <li>Tipe Hairline F4</li>
                <li>Ketebalan Shelf 1 mm</li>
                <li>Sloted 4 Tier / Susun</li>
                <li>4 Kaki Rak Memakai Adjustable 1-5 cm Yang Dapat Diatur Sesuai Ketinggian Equipment</li>
                <li>Dimensi 1500&times;550&times;1550</li>
                <li>Custom by Owner</li>
                </ul>',
                'pict' => 'sloted-rack-4-tiers.jpg',
                'is_featured' => 0,
                'is_best' => 0,
                'is_promo' => 0,
                'key' => 'Sloted Rack 4 Tiers',
                'slug' => 'sloted-rack-4-tiers',
                'meta_desc' => 'Beli Sloted Rack 4 Tiers Berkualitas Dengan Harga Terjangkau Dari PD. Karya Mitra Usaha Di Bogor Jawa Barat'
            ],
        ];

        Category::insert($category);
        Product::insert($product);
    }
}

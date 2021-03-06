<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
          'product_name'=>$row[0],
          'cat_id'=>$row[1],
          'sup_id'=>$row[2],
          'product_code'=>$row[3],
          'product_garage'=>$row[4],
          'product_route'=>$row[5],
          'product_image'=>$row[6],
          'product_buy_date'=>$row[7],
          'product_expire_date'=>$row[8],
          'product_buying_price'=>$row[9],
          'product_selling_price'=>$row[10],
          'status'=>$row[11]

        ]);
    }
}

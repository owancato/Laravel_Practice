<?php

namespace App\Repositories;

use App\Entities\ProductTable;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends Model
{
    protected $product;

    public function __construct()
    {
        $this->product = new ProductTable();
    }

    public function get()
    {
        return $this->product->paginate(20);
    }
}
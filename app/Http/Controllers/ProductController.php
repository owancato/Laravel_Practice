<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $ProductRepository;
    //
    public function __construct(
        ProductRepository $ProductRepository
    ){
        $this->ProductRepository = $ProductRepository;
    }
    
    public function show()
    {
        $productList = $this->ProductRepository->get();

        $datas = compact(
            'productList'
        );
        return view('product.index', $datas);
    }
}

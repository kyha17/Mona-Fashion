<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Services\Client\HomeService;

class HomeController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new HomeService();
    }

    public function index(){
        return view('client.home.index');
    }

    public function submitHotline(Request $request){
        return $this->service->submitHotline($request);
    }

    public function detailProduct($slug,$id){

        $getFind = $this->service->detailProduct($slug,$id);
        return view('client.detailProduct.index',compact('getFind'));
    }

    public function getAttributeAjax(Request $request){
        return $this->service->getAttributeAjax($request);
    }

    public function categoryProduct(Request $request,$slug){

        $dataCategories = $this->service->categoryProduct($slug);
        $dataProducts = $this->service->productCategories($request,$slug);


        return view('client.categoryProduct.index',compact(['dataCategories','dataProducts']));
    }


    public function productArrange(Request $request){
        return $this->service->productArrange($request);
    }

    public function allProduct(){
        return view('client.allProduct.index');
    }

    public function getAllProduct(Request $request){
        return $this->service->getAllProduct($request);
    }

    public function searchProduct(){
        return view('client.searchProducts.index');
    }

    public function searchProductAjax(Request $request){
        return $this->service->searchProductAjax($request);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\ModelBook;
use App\Models\User;
use App\Models\Models\ModelProdutos;
use App\Models\Models\ModelCategorias;

class CategoriaController extends Controller
{
    private $objUser;
    private $objBook;
    private $objCat;
    private $objProd;

    public function __construct() {
        $this->objUser=new User();
        $this->objBook=new ModelBook();
        $this->objCat=new ModelCategorias();
        $this->objProd=new ModelProdutos();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate=$this->objCat->all()->sortBy('id');
        $book=$this->objBook->all()->sortBy('id');
        return view('categoria', compact('cate', 'book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book=$this->objBook->all()->sortBy('id');
        $users=$this->objUser->all();
        $produ=$this->objProd->all();
        $cate=$this->objCat->all();
        return view('categoria', compact('users', 'book', 'produ', 'cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->objCat->create([
            'name'=>$request->name
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\ModelBook;
use App\Models\User;
use App\Models\Models\ModelProdutos;
use App\Models\Models\ModelCategorias;

class HomeController extends Controller
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
        $book=$this->objBook->all()->sortBy('id');
        return view('index', compact('book'));
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
        $prod=$this->objProd->all();
        return view('create', compact('users', 'book', 'prod'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->objBook->create([
            'id_user'=>$request->id_user,
            'carrinho'=>$request->carrinho,
            'quantidade'=>$request->quantidade,
            'price'=>$request->price
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
        $book=$this->objBook->find($id);
        $prod=$this->objProd->find($id);
        $cate=$this->objCat->find($id);
        return view('show', compact('book', 'prod', 'cate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=$this->objBook->find($id);
        $users=$this->objUser->all();
        return view('create', compact('book', 'users'));
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
        $this->objBook->where(['id'=>$id])->update([
            'title'=>$request->title,
            'pages'=>$request->pages,
            'price'=>$request->price,
            'id_user'=>$request->id_user
        ]);

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objBook->destroy($id);
        return($del)?"sim":"não";
    }
}

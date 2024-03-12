<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    public function index() {
        //
        $title = 'Danh Sách sản phẩm';
        $x = '07/03/2024';
        // Tạo câu lệnh

        $queryAll = DB::table('san-pham')->select('id', 'name', 'price');
        // Thực thi câu lệnh
        $dsSanPham = $queryAll->get();
        // truyền tham số từ controller vào view
        return view('sanpham.index', compact('title', 'x', 'dsSanPham'));
    }

    public function detail($id) {
        $title = 'Id sản phẩm = ' . $id;
        $query = DB::table('san-pham')
            ->where('id','=', $id);

        $detail = $query->get();
        return view('sanpham.detail', compact('title', 'detail'));
    }
    public function delete($id) {
        $query = DB::table('san-pham')->where('id','=', $id)->delete();
//        $query = DB::update('UPDATE san-pham SET name= 'abc' where id = 1');
        $query = DB::table('san-pham')
                -> where('id', '>=', $id)
                -> where('price', '<', 1000)
                -> update([
                    'name' => 'name update', 'price' => 123
                    ]);
        $query = DB::table('san-pham')
            ->insert([
               'name' => 'san pham 01',
               'price' => 5423
            ]);
    }
}

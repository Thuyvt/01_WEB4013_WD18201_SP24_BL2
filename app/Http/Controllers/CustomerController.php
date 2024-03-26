<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Role;

use Illuminate\Support\Facades\Storage;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::all(); //Select * from customers
//        dd($foods);
        return view('customer.index', compact('customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('customer.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        // Validate form
        $request->validate([
            'name' => ['required', 'min:2', 'max:25'],// rule dạng mảng bat buộc thỏa mãn hết
            'identify_id' => 'required|digits_between:9,10',// rule dạng bail gặp phải lỗi dừng lại ngay
            'date_of_birth' => ['required', 'date']
        ]);
        // Gặp gỗi sẽ dừng xử lý
        // Cách 1
        $customer = new Customer();
        $customer -> name = $request->input('name');
        $customer -> identify_id =$request->input('identify_id');
        $customer -> gender = $request->input('gender');
        $customer -> date_of_birth = $request->input('date_of_birth');
        $customer -> phone = $request->input('phone');
        $customer -> address = $request->input('address');
        $customer -> status = $request->input('status');
        $customer -> role_id = $request->input('role_id');
        // xuwr lý fie ảnh
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $fileName = $image->getClientOriginalName();
            $path = $request->file('img')->storeAs('public/', $fileName);

            // lưu tên file vào đối tượng
//            $customer -> img = $fileName;

            $customer = Customer::create([
               'name' => $request->input('name'),
                'identify_id' => $request->input('identify_id'),
            ]);
        }
        $customer->save();

        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id); // SELECT * from customer where id = $id
        $role = Role::find($customer->role_id);
        $customer->role = $role;
        return view('customer.detail', compact('customer'));
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
        $customer = Customer::find($id);
        $roles = Role::all();
        return view('customer.update', compact('customer', 'roles'));
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
        // Xử lý ảnh lấy ra fileName giống hàm createe
        $customer = Customer::where('id', $id);
        // xuwr lý fie ảnh
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $fileName = $image->getClientOriginalName();
            $path = $request->file('img')->storeAs('public/', $fileName);
            // Xóa ảnh đã tồn tại trong storage
            if ($customer->img) {
                Storage::delete('public/'.$customer->img);
            }
            // update ảnh mới vào cơ sở dữ liệu
            $customer->update([
                'img' => $fileName
            ]);


        }
        $customer -> update([
                [
                    'name' => $request->input('name'),
                    'identify_id' => $request->input('identify_id'),
                    'gender' => $request->input('gender'),
                    'date_of_birth' => $request->input('date_of_birth'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'status' =>$request->input('status'),
                    'role_id' => $request->input('role_id'),
                    'img' => ''
                ]
            ]);
            return redirect('/customers');
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
//        dd('Gọi hàm xóa');
        $customer = Customer::find($id);
        $customer -> delete();
        return redirect('/customers');
    }
}

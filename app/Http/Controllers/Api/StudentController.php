<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy ra toàn bộ dữ liệu trong cơ sở dữ liệu
        $students = Student::all();
        // trả ra 1 dạng list collection
//        return StudentResource::collection($students);
        return response() -> json([
            'status' => true,
            'message' => 'Lấy danh sách thành công',
            'data' => $students,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ]);
        if ($validator->fails()) {
            $arr = [
                'status' => false,
                'message' => 'Lỗi dữ liệu nhập vào',
                'data' => $request->errors()
            ];
            return response()->json($arr, 200);
        }
        // Tao bản ghi trong cơ sở dữ liệu
        $student = Student::create($request->all());

        // trường hợp không lỗi
        $arr = [
            'status' => true,
            'message' => 'Tạo mới thành công',
            'data' => new StudentResource($student)
        ];
        return response()->json($arr, 201);
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
        $student = Student::find($id);
        if (!$student) {
            $arr = [
                'status' => false,
                'message' => 'Không tìm thấy sinh viên này',
                'data' => []
            ];
            return response() -> json($arr, 200);
        }
        $arr = [
            'status' => true,
            'message' => 'Thông tin chi tiết sinh viên',
            'data' => new StudentResource($student)
        ];
        return response()->json($arr, 200);
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

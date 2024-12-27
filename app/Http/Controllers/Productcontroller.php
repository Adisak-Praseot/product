<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
class ProductController extends Controller
{
    private $products = [
        ['id' => 1, 'name' => 'Nike Men Downshifter 12',
            'description' => 'ระบายอากาศได้ดี,ให้การยึดเกาะที่ดี,เคลื่อนไหวอย่างมั่นคง,เป็นรองเท้าวิ่งที่คุ้มค่าและมีคุณภาพสูง',
            'price' => '2,200',
            'image' => 'https://i0.wp.com/down-th.img.susercontent.com/file/th-11134207-7r98z-lu0edh3fiq6p67.webp?w=1140&ssl=1'],
        ['id' => 2, 'name' => 'Adidas Running Ultrarun 5',
            'description' => 'อัปเปอร์ทำจากผ้าตาข่าย,มีเชือกผูกรองเท้า,ด้านในรองเท้าซับด้วยผ้า',
            'price' => '3,000',
            'image' => 'https://i0.wp.com/img.lazcdn.com/g/p/efba55ad2db2f1cbaf37916cceb8e0d1.jpg_300x300q80.jpg_.webp?w=1140&ssl=1'],
        ['id' => 3, 'name' => 'ASICS GEL-KAYANO 31',
            'description' => 'แผ่นหุ้มส้นเท้าด้านนอกช่วยและรองรับเท้าส่วนหลังอย่างเหนือชั้น​,เทคโนโลยีเสริมความมั่นคง LITETRUSS,ส่วนบนแบบถักที่ผ่านการออกแบบมาเพื่อทำให้ถ่ายเทอากาศได้ดี',
            'price' => '6,500',
            'image' => 'https://i0.wp.com/down-th.img.susercontent.com/file/th-11134207-7r98s-lzhe08dhwznl75.webp?w=1140&ssl=1'],
        ['id' => 4, 'name' => 'ASICS : MAGIC SPEED 3',
            'description' => 'มีน้ำหนักเบาลงมากกว่ารุ่นก่อนหน้า,สวมใส่ได้อย่างสบายมากขึ้น,ระบบกระชับลิ้นรองเท้าที่ส่วนบนช่วยเพิ่มความกระชับ',
            'price' => '6,200',
            'image' => 'https://i0.wp.com/down-th.img.susercontent.com/file/th-11134207-7r98r-lrjs4g0tt65q0c.webp?w=1140&ssl=1'],
        ['id' => 5, 'name' => '361 Degrees Flame 2.5',
            'description' => 'วัสดุผ้าเมช (Mesh) ที่มีความเบาและระบายอากาศได้ดี ช่วยให้อากาศหมุนเวียนและลดความอับชื้น,ใช้วัสดุแบบสังเคราะห์ที่ยืดหยุ่นและให้ความรู้สึกกระชับได้ดี',
            'price' => '3,049',
            'image' => 'https://i0.wp.com/down-th.img.susercontent.com/file/cn-11134207-7r98o-lp1qibpfekt35d.webp?w=1140&ssl=1'],
        ['id' => 6, 'name' => ' SAUCONY Men Endorphin',
            'description' => 'แผ่นคาร์บอนไฟเบอร์ แบบเต็มเท้า เพื่อส่งเสริมความเร็ว,เทคโนโลยี SPEEDROLL การออกแบบรูปทรงพื้น ที่ช่วยสร้างแรงขับให้คุณเคลื่อนไปข้างหน้า',
            'price' => '7,990',
            'image' => 'https://i0.wp.com/down-th.img.susercontent.com/file/th-11134207-7rase-m18alqkuiw508c.webp?w=1140&ssl=1'],
        ['id' => 7, 'name' => 'NEW BALANCE Fresh',
            'description' => 'มอบความสบายแบบ 360 องศาด้วยอัปเปอร์ผ้าถักที่มีความยืดหยุ่น,มีเทคโนโลยีพื้นโฟม Fresh Foam ช่วยลดแรงกระแทก',
            'price' => '3,835',
            'image' => 'data:image/jpeg;base64,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'],
        ['id' => 8, 'name' => 'Mizuno Wave Rider 26',
            'description' => 'เพิ่มการรองรับแรงกระแทกและการคืนพลังงานสำหรับผู้เริ่มต้นฝึกวิ่งมาราธอนโดยเฉพาะ',
            'price' => '4,800',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSe860oKOe_7uZbahpMs838CJkPqyKIfRjTtQ&s'],
        ['id' => 9, 'name' => 'On Running Cloud 5 Shoe',
            'description' => 'CloudTec สร้างจากโฟมที่มีน้ำหนักเบามีความยึดหยุ่น,มีรูปแบบการผูกเชือกรองเท้าที่สามารถปรับให้เข้ากับเท้าของคุณได้อย่างง่ายดาย',
            'price' => '5,800',
            'image' => 'https://run2paradise.com/wp-content/uploads/2024/01/black-white.jpg'],
        ['id' => 10, 'name' => 'REEBOK Flexagon Energy',
            'description' => 'อัปเปอร์ทำจากผ้าริปสต็อปทำให้ระบายอากาศได้ดี,มาพร้อมส่วนป้องกันนิ้วเท้าที่ช่วยเสริมความทนทาน',
            'price' => '7,960',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrhuNmrpgK_kJazCtvzKCGP0XR3SosQKV_QQ&s'],

    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return Inertia::render('Products/Index', ['products' => $this->products // ส่งข้อมูลสินค้าที่ได้จากฐานข้อมูลไปยัง Vue component
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $product = collect($this->products)->firstWhere('id',$id);
       if (!$product){
        abort(404, 'Product not found');
       }
       return Inertia::render('Products/Show', ['product'=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

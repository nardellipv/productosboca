<?php

namespace bocaamerica\Http\Controllers\Admin;

use bocaamerica\Discount;
use Illuminate\Http\Request;
use bocaamerica\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function index()
    {
        $cuopons = Discount::all();

        return view('admin.parts.dashboard._coupon', compact('cuopons'));
    }

    public function store(Request $request)
    {
        $cuopon = new Discount();

        $cuopon->fill($request->all())->save();

        return back();
    }

    public function active($id)
    {
        $cuopon = Discount::find($id);
        $cuopon->status = 'ACTIVE';
        $cuopon->save();

        return back();
    }

    public function desactive($id)
    {
        $cuopon = Discount::find($id);
        $cuopon->status = 'DESACTIVE';
        $cuopon->save();

        return back();
    }

    public function destroy($id)
    {
        $cuopon = Discount::find($id);
        $cuopon->delete();

        return back();
    }
}

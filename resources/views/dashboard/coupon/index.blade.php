<x-dashboard-layout header="كوبونات الخصم">
    <div class="container">
        <div class="card mt-3">
            @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
            @endif
            <div class="card-body">

                <a style="margin-bottom:15px;" href="{{ route('admin.coupons.create') }}" class="btn btn-info ">
                   إضافة كوبون <i class="fas fa-plus"></i></a> 


                <table class="table table-bordered border-primary text-center">

                    <thead class="table-light">
                        <tr style="text-align: center">

                            <th>كود الخصم</th>
                            <th>النوع</th>
                            <th> قيمة الخصم</th>
                            <th>عدد مرات الاستخدام</th>
                            <th>تاريخ البدء</th>
                            <th>تاريخ الانتهاء</th>
                            <th>الحالة</th>
                            <th>عمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>

                                <td>{{ $coupon->code }}</td>

                                <td>
                                    @if ($coupon->type == 'fixed')

                                        <span> قيمة ثابتة </span>

                                    @elseif($coupon->type == 'percentage')
                                        <span> نسبة مئوية</span>

                                    @endif

                                </td>
                                <td>{{ $coupon->discount_value }}</td>
                                <td>{{ $coupon->used_time . '/' . $coupon->use_time }}</td>
                                <td>{{ date('d-m-Y', strtotime( $coupon->start_date)) }}</td>
                                <td>{{ date('d-m-Y', strtotime( $coupon->expire_date)) }} </td>
                                <td>
                                    @if ($coupon->status == 'active')

                                        <span style="color:green;text-decoration:none"> فعال </span>

                                    @else
                                        <span style="color: gray; text-decoration:none"> غير فعال</span>

                                    @endif

                                </td>
                                <td class="table-action">
                                    <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-primary">تعديل
                                        <i class="far fa-edit"></i></a>

                                    <form class="d-inline"
                                        action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"><span style="color: white"> حذف <i
                                                    class="fas fa-trash"></i> </span> </button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
                {{ $coupons->links() }}
            </div>
        </div>
    </div>
</x-dashboard-layout>

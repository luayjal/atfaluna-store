<x-dashboard-layout header=" الهدايا">
    <div class="container">
        <div class="card mt-3">
            @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
            @endif
            <div class="card-body">
                @can('create', App\Models\Coupon::class)

                <a style="margin-bottom:15px;" href="{{ route('admin.gifts.create') }}" class="btn btn-info ">
                   إضافة مسابقة <i class="fas fa-plus"></i></a>
                    @endcan

                <table class="table table-bordered border-primary text-center">

                    <thead class="table-light">
                        <tr style="text-align: center">

                            <th>كود الهدية</th>
                            <th>العنوان</th>
                            <th>المنتج</th>
                            <th>الحالة</th>
                            <th>عمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gifts as $gift)
                            <tr>

                                <td>{{ $gift->code }}</td>
                                <td>{{ $gift->title }}</td>
                                <td>{{ $gift->product->name }}</td>
                                <td>
                                    @if ($gift->status == 'active')

                                        <span style="color:green;text-decoration:none"> فعال </span>

                                    @else
                                        <span style="color: gray; text-decoration:none"> غير فعال</span>

                                    @endif

                                </td>
                                <td class="table-action">


                                    <a href="{{ route('admin.gifts.edit', $gift->id) }}" class="btn btn-primary">تعديل
                                        <i class="far fa-edit"></i></a>


                                    <form class="d-inline"
                                        action="{{ route('admin.gifts.destroy', $gift->id) }}" method="post">
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
                {{ $gifts->links() }}
            </div>
        </div>
    </div>
</x-dashboard-layout>

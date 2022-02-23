<x-delivery-layout header="الطلبات المستلمة">

    <div class="content">
        <div class="container">

            <br>

            <div class="box box-primary">

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="box-body">
                    <table  class="table table-bordered border-primary">

                        <thead class="table-stripped">
                        <tr style="text-align: center">

                            <th >الاسم </th>
                            <th >الايميل</th>
                            <th >الجوال</th>
                            <th >العنوان</th>
                            <th >postcode</th>
                            <th >الاجمالي</th>
                            <th >عمليات</th>

                        </tr>
                        <tbody>
                        @foreach ($data as $row )

                            <tr style="text-align: center">

                                <td style="text-align: center">{{ $row->name	}}</td>
                                <td style="text-align: center">{{ $row->email	}}</td>
                                <td style="text-align: center">{{ $row->phone	}}</td>
                                <td style="text-align: center">{{ $row->address	}}</td>
                                <td style="text-align: center">{{ $row->postcode	}}</td>
                                <td style="text-align: center">{{ $row->grandtotal	}}</td>
                                <td style="text-align: center">
{{--                                    <a class="btn btn-primary"--}}
{{--                                       href="{{ route('Delivery.details',$row->id)	}}" >--}}
{{--                                        تفاصيل--}}
{{--                                    </a>--}}
                                    <a class="btn btn-primary"
                                       href="{{ route('Delivery.comp',$row->id)	}}" >
                                        تسليم
                                    </a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</x-delivery-layout>

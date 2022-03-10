<x-dashboard-layout header="تقييم المنتجات">

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
                    <table class="table table-bordered border-primary">

                        <thead class="table-stripped">
                        <tr style="text-align: center">

                            <th>اسم المنتج</th>
                            <th colspan="2">التقييم</th>
                            <th>الحالة</th>
                            <th>العمليات</th>
                        </tr>
                        <tbody>
                        <style>
                            .yellow{
                                color: yellow;
                                -webkit-text-stroke-width: 1px;
                                -webkit-text-stroke-color: orange;
                            }
                        </style>
                        @foreach ($evals as $eval)

                            <tr style="text-align: center">

                                <td style="text-align: center">{{ $eval->name	}}</td>

                                <td>
                                    @for($i=1;$i<=5;++$i)
                                        @if($eval->eval >=$i)
                                            <i class="fas fa-star yellow"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </td>
                                <td>
                                    {{$eval->review}}
                                </td>

                                <td>
                                    @if($eval->status =='active')

                                        <a href="#" style="color:green;text-decoration:none"> فعال</a>

                                    @else
                                        <a href="#" style="color: gray; text-decoration:none"> غير فعال</a>

                                    @endif

                                </td>

                                <td style="text-align: center; margin-top:20px">
                                    @if($eval->status !='active')
                                        <form class="d-inline"
                                              action="{{route('admin.evaluation.products.change',$eval->id)}}"
                                              method="post">
                                            @csrf
                                            <button class="btn btn-primary">
                                                تفعيل
                                            </button>
                                        </form>

                                    @endif


                                    <form class="d-inline"
                                          action="{{route('admin.evaluation.products.delete',$eval->id)}}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"><span style="color: white"> حذف <i
                                                    class="fas fa-trash"></i> </span></button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                        </thead>
                    </table>

                </div>
                {{ $evals->links() }}
            </div>
        </div>
    </div>
    </div>
    </div>

</x-dashboard-layout>

<x-dashboard-layout header="تقييم المتجر">

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
                    <div class="row justify-content-between">
                    @foreach ($reviews as $review)
                    <!-- Review -->
                    <div class="card col-md-6">
                        <div class="card-body">
                            <div class="d-flex flex-w flex-t p-b-68">
                                <div class="wrap-pic-s size-109 bor0 of-hidden  ">
                                    <img class="rounded-circle" src="{{$review->avatar}}" alt="AVATAR">
                                </div>

                                <div class="size-207 w-100 ml-3">
                                    <div class="d-flex justify-content-between p-b-17">
                                        <span class="mtext-107 cl2 p-l-20">
                                           {{$review->name}}
                                        </span>

                                        <span class="fs-18 cl11">
                                            @for ($i=1; $i<=$review->rating;$i++)
                                            <i style="color: #f9ba48" class="fas fa-star"></i>
                                            @endfor

                                        </span>
                                    </div>

                                    <p class="stext-102 cl6 font-weight-bold">
                                        {{$review->review}}
                                    </p>
                                    <form class="d-inline"
                                            action="{{ route('admin.evaluation.store.delete', $review->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger btn-sm float-right">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                </div>
                            </div>
                        </div>
                    </div>


                    @endforeach
                </div>

                </div>
                {{$reviews->links() }}
            </div>
        </div>
    </div>
    </div>
    </div>

</x-dashboard-layout>

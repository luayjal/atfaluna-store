<x-delivery-layout header="الطلبات الواردة">

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


                </div>
            </div>
        </div>
    </div>

</x-delivery-layout>

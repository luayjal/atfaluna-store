<x-dashboard-layout header="اضافة فيديو اعلاني">
    <div class="container">
        <div class="card">

            <div class="card-body">
                <form action="{{ route('admin.advertising.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('dashboard.advertising.form')
                </form>
            </div>
        </div>
    </div>




</x-dashboard-layout>

<x-dashboard-layout header="تعديل المنتج">
    <div class="container">
      <div class="card">
       
        <div class="card-body">
          <form action="{{ route('admin.products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('dashboard.products.form',[
                'lable_btn'=>'تعديل'
                ])
          </form>
        </div>
    </div>
    </div>
  
  
  
  @push('css')

    <!------- tagify --------->
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

    <!------- ckeditor --------->
    <script src="{{asset('dashboard/ckeditor/build/ckeditor.js')}}"></script>
  
  @endpush
  @push('js')
  {{--     <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
      <script>
          $(function() {
              bsCustomFileInput.init();
          });
      </script> --}}
      <script src="https://unpkg.com/@yaireo/tagify"></script>
      <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
      <script>
          var color = document.querySelector('.color'),
         tagify = new Tagify(color);
         var size = document.querySelector('.size'),
         tagify = new Tagify(size);

  
          function deleteImage(id) {
              document.querySelector('#imageId').value = id;
              document.querySelector('#deleteGallery').submit();
          }
      </script>
        <script>
            ClassicEditor
                    .create( document.querySelector( '#editor' ))
                    .then( editor => {
                            console.log( editor );
                    } )
                    .catch( error => {
                            console.error( error );
                    } );
          </script>
  @endpush
</x-dashboard-layout>
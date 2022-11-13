@extends('partials.tamplate')

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Create Table</h1>
    </div>
</section>
            <div class="card">
                <div class="card-body ">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-icon btn-info mb-3">
                        Back
                    </a>
                        <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                            <div class="card-header">
                                <h4>Create Data Table</h4>
                            </div>

                            <form action="{{ route('admin.products.store') }}" method="POST" class="card-body">
                                @csrf
                                <div class="alert alert-info">
                                <b>Note!</b> Please Input valid
                                </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>

                            <div class="form-group">
                                <label for="desc">desc</label>
                                <textarea type="text" name="desc" id="desc" class="form-control" cols="40" rows="10">{{ old('desc') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                                    </div>

                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control">
                                    </div>

                                <div class="form-group">
                                    <label for="gallery">Gallery</label>
                                    <div class="needsclick dropzone" id="gallery-dropzone"></div>
                                    </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $id => $categoryName)
                                    <option value="{{ $id }}">{{ $categoryName }}</option>
                                @endforeach
                                </select>

                            <div class="form-group">
                                <label for="tags">Tag</label>
                                <select name="tags[]" class="form-control" multiple>
                                    @foreach($tags as $id => $tagName)
                                    <option value="{{ $id }}">{{ $tagName }}</option>
                                @endforeach
                                </select>



                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    <button class="btn btn-secondary" type="reset">Reset</button>
                                </div>
                            </form>


                        </tbody>
                    </table>

                    @endsection
                    @push('style-alt')
                    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
                    @endpush

                    @push('js-alt')
                    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

                    <script>
                        var uploadedGalleryMap = {}
                     Dropzone.options.galleryDropzone = {
                         url: "{{ route('admin.products.storeImage') }}",
                         maxFilesize: 5, // MB
                         maxFiles: 4,
                         acceptedFiles: '.jpeg,.jpg,.png,.gif',
                         addRemoveLinks: true,
                         headers: {
                           'X-CSRF-TOKEN': "{{ csrf_token() }}"
                         },
                         success: function (file, response) {
                           $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
                           uploadedGalleryMap[file.name] = response.name
                         },
                         removedfile: function (file) {
                           file.previewElement.remove()
                           var name = ''
                           if (typeof file.file_name !== 'undefined') {
                             name = file.file_name
                           } else {
                             name = uploadedGalleryMap[file.name]
                           }
                           $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
                         },
                         init: function () {
                     @if(isset($product) && $product->gallery)
                           var files =
                             {!! json_encode($product->gallery) !!}
                               for (var i in files) {
                               var file = files[i]
                               this.options.addedfile.call(this, file)
                               this.options.thumbnail.call(this, file, file.original_url)
                               file.previewElement.classList.add('dz-complete')
                               $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
                             }
                     @endif
                         },
                          error: function (file, response) {
                              if ($.type(response) === 'string') {
                                  var message = response //dropzone sends it's own error messages in string
                              } else {
                                  var message = response.errors.file
                              }
                              file.previewElement.classList.add('dz-error')
                              _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                              _results = []
                              for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                                  node = _ref[_i]
                                  _results.push(node.textContent = message)
                              }
                              return _results
                          }
                     }
                     </script>

                        @endpush

@extends('partials.tamplate')

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Create Table</h1>
    </div>
</section>
            <div class="card">
                <div class="card-body ">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-icon btn-info mb-3">
                        Back
                    </a>
                        <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                            <div class="card-header">
                                <h4>Create Data Table</h4>
                            </div>

                            <form action="{{ route('admin.categories.store') }}" method="POST" class="card-body">
                                @csrf
                                <div class="alert alert-info">
                                <b>Note!</b> Please Input valid
                                </div>
                                <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="desc">desc</label>
                                <input type="text" name="desc" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="photo">photo</label>
                                    <div class="needsclick dropzone" id="photo-dropzone"></div>
                                    </div>

                            <div class="form-group">
                                <label for="parent">Parent</label>
                                <select name="category_id" class="form-control">
                                    <option value="">-- Default --</option>
                                    @foreach($categories as $id => $categoryName)
                                    <option value="{{ $id }}">{{ $categoryName }}</option>
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
                        Dropzone.options.photoDropzone = {
                                url: "{{ route('admin.categories.storeImage') }}",
                                acceptedFiles: '.jpeg,.jpg,.png,.gif',
                                maxFiles: 5,
                                addRemoveLinks: true,
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            success: function (file, response) {
                                $('form').find('input[name="photo"]').remove()
                                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
                            },
                            removedfile: function (file) {
                                file.previewElement.remove()
                                if (file.status !== 'error') {
                                    $('form').find('input[name="photo"]').remove()
                                    this.options.maxFiles = this.options.maxFiles + 5
                                }
                            },
                            init: function () {
                                @if(isset($category) && $category->photo)
                                    var file = {!! json_encode($category->photo) !!}
                                        this.options.addedfile.call(this, file)
                                    this.options.thumbnail.call(this, file, "{{ $category->photo->getUrl() }}")
                                    file.previewElement.classList.add('dz-complete')
                                    $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                                    this.options.maxFiles = this.options.maxFiles - 5
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

@extends('admin.layouts.app')
<link rel="stylesheet" href="{{ asset('assets/css/admin.css')}}">
@section('content')

    <div class="container-fluid">
        <div class="row px-3 pt-3 justify-content-between pt-5">
            <div class="col-md-4">
                <h5>Update Category
                </h5>
                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                @if (\Session::has('error'))
                    <div>
                        <li class="alert alert-danger">{!! \Session::get('error') !!}</li>
                    </div>
                @endif

                @if (\Session::has('success'))
                    <div>
                        <li class="alert alert-success">{!! \Session::get('success') !!}</li>
                    </div>
                @endif
                <form action="" method="post">
                    {{ csrf_field() }}
                    @method('PUT')
                    
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category name*</label>
                                    <input type="text" name="title" id="title" value="" class="form-control"
                                        placeholder=""  />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category slug*</label>
                                    <input type="text" name="slug" id="slug" value="" class="form-control"
                                        placeholder=""  />
                                </div>
                            </div>
                            <div class="card card-primary ">
                            <div class="card-header">
                                <h3 class="card-title">Featured Image
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus" aria-hidden="true">
                                        </i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-0">
                                <div class="form-group">
                                    <small class="text-red">&nbsp;&nbsp;Note: size: Width-1200px Height: 800px
                                    </small>
                                    <input name="image" accept="image/*" type="file" id="imgInp">
                                   
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-danger">Update</button>
                        <a href="{{route('add-gifts')}}" class="btn btn-info ml-3"> Back</a>

                    </div>

                </form>


            </div>

        </div>
    </div>



    <script>
        $('#title').on("change keyup paste click", function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $('#slug').val(Text);
        });
    </script>

    <script>
        $('#title').on("change keyup paste click", function() {
            var Text = $(this).val().trim();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $('#slug').val(Text);
        });
    </script>


@endsection


<link rel="stylesheet" href="{{ asset('assets/css/admin.css')}}">



    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container-fluid">
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

        @if (session()->has('success'))
            <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>
                    {!! session()->get('success') !!}
                </strong>
            </div>
        @endif
        <div class="row px-3 pt-3 justify-content-between">
            <div class="col-md-4 ">
                <h5>Add New Category
                </h5>
                <form role="form" method="post" action="{{route('add-category.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Main  Category name*</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Category Name" value="" required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="slug" class="form-label bg-light">Slug <small>Unique url of the
                                            category</small></label>
                                    <input type="text" name="slug" class="form-control bg-light" id="slug">
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
                        <button type="submit" class="btn btn-primary">Create</button>

                    </div>
                </form>
                <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 20%">
                                        Category
                                    </th>
                                    <th style="width: 20%">
                                        Slug
                                    </th>
                                    <th style="width: 30%">
                                        Image
                                    </th>
                                    <th style="width: 29%">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>

@foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td>
                                            <a>
                                                {{ $category->title }}
                                            </a>

                                        </td>
                                        <td>
                                            <a>{{ $category->slug }}</a>
                                        </td>
                                        <td>
                                            <a> <a><img src="{{ asset('images/' . $category->image) }}" alt="{{ $category->title }}" width="100"></a></a>
                                        </td>
                                        <td class="project-actions text-right d-flex">

                                        <form action=""
                                                        method="get">
                                                       
                                                        <button type="submit" class="btn btn-success btn-sm">
                                                            <i class="fas fa-edit">
                                                            </i>
                                                            Edit
                                                        </button>
                                                    </form>
                                                        
                                            <form action="{{route('add-category.delete',$category->id)}}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button
                                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                                            type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </button>
                                                    </form>
                                        </td></thead>
                                        
                                        @endforeach

            </div>
                
            <div class="col-md-8 pt-4 pl-lg-5">
                <div class="card">
                    <div class="card-header">
                       

                        <div class="card-tools">
                            {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button> --}}
                            <div class="form-inline">
                                <form action="" method="get">
                                    <div class="input-group" data-widget="search">
                                        
                                        <div class="input-group-append border">
                                            <button type="submit" class="btn btn-sidebar pb-1">
                                                <i class="fas fa-search fa-fw"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>


    {{-- for auto hide alert message --}}
    <script>
        $(document).ready(function() {
            $(".alert").delay(5000).slideUp(300);
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



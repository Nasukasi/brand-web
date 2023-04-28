@extends('admin.layout.template')
@section('page_title')
    Young spirit-Edit sub-category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page|</span> Edit Sub-Category</h4>

        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Sub-Category</h5>
                    <small class="text-muted float-end">Input information</small>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('updatesubcat')}}" method="POST">

                        @csrf
                        <input type="hidden" value="{{$subcatinfo->id}}" name="subcatid">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Sub-Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" value="{{$subcatinfo->subcategory_name}}" />
                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@extends('app')

@section('title', 'Create Product')

@section('content')
<div class="pagetitle">
    <h1>Create Product</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('products') }}">Products</a></li>
            <li class="breadcrumb-item active">Create Product</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Create Product</h5>

            <form action="{{ url('products/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="description" style="height: 100px">{{ old('description') }}</textarea>
                      @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="category" aria-label="Default select example">
                        <option selected>-- Select Category --</option>
                        <option value="Accessories">Accessories</option>
                      </select>
                      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-10">
                      <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
                      @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                      <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                      @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="image" type="file" id="formFile">
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

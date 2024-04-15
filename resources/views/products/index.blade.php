@extends('app')

@section('title', 'Products')

@section('content')
    <div class="pagetitle">
        <h1>Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">All Products</h5>
                <a href="{{ url('products/create') }}" class="btn btn-primary mb-3">Add Product</a>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" style="width: 70px; height:70px;" alt="Img" />
                                </td>
                                <td>
                                    <a href="{{ url('products/'.$product->id.'/edit') }}" class="btn btn-success mx-2">Edit</a>

                                    <a
                                        href="{{ url('products/'.$product->id.'/delete') }}"
                                        class="btn btn-danger mx-1"
                                        onclick="return confirm('Do you want to delete this Data? ?')"
                                    >
                                        Delete
                                    </a>
                                </td>
                          </tr>
                        @empty

                        @endforelse
                    </tbody>
                  </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection

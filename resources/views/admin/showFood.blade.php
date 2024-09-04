@extends('layout.admin')

@section('title', 'Show Food')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">                    
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-6">
                    <h1>Show Food</h1>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('foods.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body table-responsive p-0">                         
                            <table class="table table-bordered table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td><b>Name</b></td>
                                        <td>{{ $food->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Category</b></td>
                                        <td>{{ $food->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Restaurant</b></td>
                                        <td>{{ $food->restaurant->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Price</b></td>
                                        <td>{{ $food->price }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Discount Price</b></td>
                                        <td>{{ $food->discount_price }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Popular</b></td>
                                        <td>{{ $food->is_popular == 'yes' ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Recommend</b></td>
                                        <td>{{ $food->is_recommend == 'yes' ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Status</b></td>
                                        <td>{{ $food->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Description</b></td>
                                        <td>{{ $food->description }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Photo</b></td>
                                        <td>
                                            <img src="{{ asset('uploads/foods/' . $food->photo) }}" style="    width: 200px; border: 1px solid skyblue;" alt="Restaurant photo">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
@endsection
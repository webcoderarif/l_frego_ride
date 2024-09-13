@extends('layout.admin')

@section('title', 'Foods')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">                    
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-6">
                    <h1>Foods</h1>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('foods.create') }}" class="btn btn-primary">Add Food</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                @if(Session::has('status'))
                    <div class="alert alert-success">{{ Session::get('status') }}</div>
                @endif
                <div class="card-body table-responsive p-0">                         @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Restaurant</th>
                                <th>Photo</th>
                                <th>Price</th>
                                <th>Discount Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($foods->isNotEmpty())
                                @php
                                    $serial = 1;
                                @endphp

                                @foreach($foods as $food)
                                    <tr>
                                        <td>{{ $serial++; }}</td>
                                        <td>{{ $food->name }}</td>
                                        <td>{{ $food->category->name }}</td>
                                        <td>{{ $food->restaurant->name }}</td>
                                        <td>
                                            @if($food->photo != NULL)
                                                <img src="{{ asset('uploads/foods/' . $food->photo) }}" style="    width: 60px; border: 1px solid skyblue;" alt="Restaurant photo">
                                            @endif
                                        </td>
                                        <td>{{ $food->price }}</td>
                                        <td>{{ $food->discount_price }}</td>
                                        <td>{{ $food->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('foods.show', $food->id) }}">
                                                View
                                            </a>
                                            <a class="btn btn-warning btn-sm" href="{{ route('foods.edit', $food->id) }}">
                                                Edit
                                            </a>
                                            <form class="d-inline-block" action="{{ route('foods.destroy', $food->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?');">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">No foods found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>                                        
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">{{ $foods->links() }}</div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
@endsection
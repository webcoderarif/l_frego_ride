@extends('layout.admin')

@section('title', 'Categories')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">                    
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-6">
                    <h1>Restaurants</h1>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('restaurants.create') }}" class="btn btn-primary">Add Restaurant</a>
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
                <div class="card-body table-responsive p-0">                            @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($restaurants->isNotEmpty())
                                @php
                                    $serial = 1;
                                @endphp

                                @foreach($restaurants as $restaurant)
                                    <tr>
                                        <td>{{ $serial++; }}</td>
                                        <td>{{ $restaurant->name }}</td>
                                        <td>
                                            @if($restaurant->photo != NULL)
                                                <img src="{{ asset('uploads/restaurants/' . $restaurant->photo) }}" style="    width: 150px; border: 1px solid skyblue;" alt="Restaurant photo">
                                            @endif
                                        </td>
                                        <td>{{ $restaurant->address }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ route('restaurants.edit', $restaurant->id) }}">
                                                Edit
                                            </a>
                                            <form class="d-inline-block ml-2" action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?');">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">No restaurants found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>                                        
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">{{ $restaurants->links() }}</div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
@endsection
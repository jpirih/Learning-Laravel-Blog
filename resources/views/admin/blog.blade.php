@extends('base')

@section('title')
    Blog Administration
@endsection

@section('page-heading')
    Blog Administration
@endsection

@section('content')
    <div class="col-sm-9">
        <h2>All posts overview</h2>
    </div>
    <div class="col-sm-3">
        <h3>Categories</h3>
        <!-- create new dategory form validation  -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table table-bordered table-responsive table-striped">
            <thead>
            <tr>
                <td colspan="2">
                    <form action="{{route('crete_category')}}" method="post" class="form-inline">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" name="category_name" placeholder="Naziv" class="form-control">
                            </div>
                            <span class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </span>
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <th># Id</th>
                <th>Naziv</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    </div>
@endsection
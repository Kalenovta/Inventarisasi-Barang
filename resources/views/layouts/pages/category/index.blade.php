@extends('layouts.main')

@section('header')
    <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori</h1>
          </div>
        </div>
@endsection

@section('content')
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header d-flex">
            <a href="/category/create" class="btn btn-sm btn-primary">
              Tambah Kategori
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categorys as $category)
                  <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <form action="/category/{{ $category->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection
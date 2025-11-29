@extends('layouts.main')

@section('header')
    <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Kategori</h1>
          </div>
        </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
          
          <form action="/category/store" method="POST">
            @csrf

            <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control  @error('name') is-invalid @enderror" >{{ old('description') }}</textarea>
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <a href="/category" class="btn btn-sm btn-secondary btn-danger mr-2">Batal</a>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </div>
            </div>
          </div>
        </form>
      </div>
    </div>
@endsection
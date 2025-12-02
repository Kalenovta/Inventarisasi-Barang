@extends('layouts.main')

@section('header')
    <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
        </div>
@endsection

@section('content')
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header d-flex">
            <a href="/products/create" class="btn btn-sm btn-primary">
              Tambah Barang
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Kode</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                  <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                          @if($product->photo)
                            <img src="{{ asset('storage/' . $product->photo) }}" 
                                 alt="{{ $product->name }}" 
                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px; cursor: pointer;"
                                 onclick="showImageModal('{{ asset('storage/' . $product->photo) }}', '{{ $product->name }}')">
                          @else
                            <img src="{{ asset('images/no-image.png') }}" 
                                 alt="No Image" 
                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px; opacity: 0.5;">
                          @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->category->name ?? '-' }}</td>
                        <td>
                          <div class="d-flex">
                            <a href="/products/edit/{{ $product->id }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            <form action="/products/{{ $product->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal untuk melihat foto besar -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel">Foto Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <img id="modalImage" src="" alt="" style="max-width: 100%; height: auto;">
          </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
<script>
function showImageModal(imageSrc, productName) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('modalImage').alt = productName;
    document.getElementById('imageModalLabel').textContent = 'Foto ' + productName;
    $('#imageModal').modal('show');
}
</script>
@endpush
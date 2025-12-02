@extends('karyawan')

@section('content')
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h2><i class="fas fa-boxes text-primary"></i> Daftar Produk</h2>
            <p class="text-muted">Lihat semua produk yang tersedia di inventory</p>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari produk...">
                <div class="input-group-append">
                    <span class="input-group-text bg-primary text-white">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Total Produk</h6>
                            <h3 class="mb-0">{{ $products->count() }}</h3>
                        </div>
                        <i class="fas fa-box fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Stok Tersedia</h6>
                            <h3 class="mb-0">{{ $products->where('stock', '>', 0)->count() }}</h3>
                        </div>
                        <i class="fas fa-check-circle fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">Stok Habis</h6>
                            <h3 class="mb-0">{{ $products->where('stock', '<=', 0)->count() }}</h3>
                        </div>
                        <i class="fas fa-exclamation-triangle fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter -->
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary active" onclick="filterProducts('all')">
                    <i class="fas fa-th"></i> Semua
                </button>
                <button type="button" class="btn btn-outline-success" onclick="filterProducts('available')">
                    <i class="fas fa-check"></i> Stok Tersedia
                </button>
                <button type="button" class="btn btn-outline-danger" onclick="filterProducts('empty')">
                    <i class="fas fa-times"></i> Stok Habis
                </button>
            </div>
        </div>
    </div>

    <!-- Daftar Produk (Card View) -->
    <div class="row" id="productList">
        @forelse ($products as $product)
        <div class="col-md-4 mb-4 product-item" data-stock="{{ $product->stock }}" data-name="{{ strtolower($product->name) }}" data-sku="{{ strtolower($product->sku) }}">
            <div class="card product-card">
                <div class="position-relative">
                    @if($product->photo)
                        <img src="{{ asset('storage/'.$product->photo) }}" 
                             alt="{{ $product->name }}" 
                             class="card-img-top product-image">
                    @else
                        <img src="https://via.placeholder.com/400x200?text={{ urlencode($product->name) }}" 
                             alt="{{ $product->name }}" 
                             class="card-img-top product-image">
                    @endif
                    
                    @if($product->stock <= 0)
                        <span class="badge badge-danger badge-stock">
                            <i class="fas fa-times-circle"></i> Habis
                        </span>
                    @elseif($product->stock < 10)
                        <span class="badge badge-warning badge-stock">
                            <i class="fas fa-exclamation-circle"></i> Stok Menipis
                        </span>
                    @else
                        <span class="badge badge-success badge-stock">
                            <i class="fas fa-check-circle"></i> Tersedia
                        </span>
                    @endif
                </div>
                
                <div class="card-body">
                    <h5 class="card-title mb-2">{{ $product->name }}</h5>
                    <p class="card-text text-muted small mb-2">
                        <i class="fas fa-barcode"></i> SKU: {{ $product->sku }}
                    </p>
                    <p class="card-text small text-truncate mb-3">
                        {{ $product->description ?? 'Tidak ada deskripsi' }}
                    </p>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <span class="text-muted small">Harga:</span>
                            <h5 class="text-primary mb-0">Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                        </div>
                        <div class="text-right">
                            <span class="text-muted small">Stok:</span>
                            <h5 class="mb-0 {{ $product->stock <= 0 ? 'text-danger' : ($product->stock < 10 ? 'text-warning' : 'text-success') }}">
                                {{ $product->stock }}
                            </h5>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge badge-info">
                            <i class="fas fa-tag"></i> {{ $product->category->name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle fa-2x mb-3"></i>
                <h5>Belum ada produk</h5>
                <p class="mb-0">Saat ini belum ada produk yang terdaftar di sistem.</p>
            </div>
        </div>
        @endforelse
    </div>
@endsection

@push('scripts')
<script>
// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const products = document.querySelectorAll('.product-item');
    
    products.forEach(product => {
        const name = product.getAttribute('data-name');
        const sku = product.getAttribute('data-sku');
        
        if (name.includes(searchValue) || sku.includes(searchValue)) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
});

// Filter functionality
function filterProducts(filter) {
    const products = document.querySelectorAll('.product-item');
    const buttons = document.querySelectorAll('.btn-group button');
    
    // Update active button
    buttons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    products.forEach(product => {
        const stock = parseInt(product.getAttribute('data-stock'));
        
        if (filter === 'all') {
            product.style.display = 'block';
        } else if (filter === 'available' && stock > 0) {
            product.style.display = 'block';
        } else if (filter === 'empty' && stock <= 0) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}
</script>
@endpush
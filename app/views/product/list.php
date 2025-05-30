<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="display-7 font-weight-bold text-primary text-dark">QUẢN LÝ SẢN PHẨM</h1>
        <a href="/webbanhang/product/add" class="btn btn-success btn-lg">
            <i class="fas fa-plus-circle mr-2"></i>Thêm sản phẩm
        </a>
    </div>

    <?php if (!empty($products)): ?>
    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card product-card h-100 shadow-sm">
                <div class="card-img-top product-image-container">
                    <?php if (!empty($product->image)): ?>
                        <img src="/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                             class="product-image"
                             alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/300x200?text=No+Image" 
                             class="product-image"
                             alt="No image">
                    <?php endif; ?>
                </div>
                
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h3 class="card-title font-weight-bold mb-0">
                            <a href="/webbanhang/Product/detail/<?php echo $product->id; ?>" 
                               class="text-decoration-none text-dark">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h3>
                        <span class="badge badge-pill badge-info">ID: <?php echo $product->id; ?></span>
                    </div>
                    
                    <p class="text-muted mb-2">
                        <i class="fas fa-tag mr-1"></i>
                        <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                    
                    <p class="card-text text-truncate-3 mb-3">
                        <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                    
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="text-danger font-weight-bold mb-0">
                            <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                        </h5>
                        <div class="product-actions">
                            <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" 
                               class="btn btn-sm btn-outline-warning mr-1"
                               title="Sửa sản phẩm">
                               <i class="fas fa-edit"></i>
                            </a>
                            <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>"
                               class="btn btn-sm btn-outline-danger mr-1"
                               title="Xóa sản phẩm"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                               <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Nút Xem chi tiết -->
                <a href="/webbanhang/Product/detail/<?php echo $product->id; ?>" 
                class="btn btn-sm btn-info btn-block mb-2">
                    <i class="fas fa-info-circle mr-1"></i> Xem chi tiết
                </a>

                <!-- Nút Thêm vào giỏ hàng -->
                <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" 
                class="btn btn-sm btn-primary btn-block">
                    <i class="fas fa-cart-plus mr-1"></i> Thêm vào giỏ hàng
                </a>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="alert alert-info text-center py-5">
        <i class="fas fa-box-open fa-3x mb-3 text-info"></i>
        <h3 class="alert-heading">Không có sản phẩm nào</h3>
        <p>Hãy bắt đầu bằng cách thêm sản phẩm mới</p>
        <a href="/webbanhang/product/add" class="btn btn-info mt-2">
            <i class="fas fa-plus mr-1"></i> Thêm sản phẩm đầu tiên
        </a>
    </div>
    <?php endif; ?>
</div>

<style>
    .product-card {
        transition: all 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
        border: none;
        background:rgb(255, 255, 255);
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    .product-image-container {
        height: 200px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background:rgb(255, 255, 255);
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-image {
        transform: scale(1.05);
    }

    .text-truncate-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .product-actions .btn {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>

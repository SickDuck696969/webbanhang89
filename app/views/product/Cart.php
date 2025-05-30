<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <h1 class="mb-4">Giỏ hàng</h1>

    <?php if (!empty($cart)): ?>
    <form action="/webbanhang/Product/updateCart" method="POST">
        <div class="row">
            <?php
            $totalPrice = 0;
            foreach ($cart as $id => $item):
                $itemTotal = $item['price'] * $item['quantity'];
                $totalPrice += $itemTotal;
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card product-card h-100 shadow-sm">
                    <div class="card-img-top product-image-container">
                        <?php if (!empty($item['image'])): ?>
                            <img src="/<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" 
                                class="product-image"
                                alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/300x200?text=No+Image" 
                                class="product-image"
                                alt="No image">
                        <?php endif; ?>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h3 class="card-title font-weight-bold mb-0">
                                <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </h3>
                            <span class="badge badge-pill badge-info">ID: <?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?></span>
                        </div>

                        <?php if (!empty($item['description'])): ?>
                        <p class="card-text text-truncate-3 mb-3">
                            <?php echo htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                        <?php endif; ?>

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="text-danger font-weight-bold mb-0">
                                <?php echo number_format($item['price'], 0, ',', '.'); ?> VND
                            </h5>
                            <input type="number" name="quantities[<?php echo $id; ?>]"
                                   value="<?php echo $item['quantity']; ?>"
                                   min="1"
                                   class="form-control form-control-sm"
                                   style="width: 70px;">
                        </div>

                        <p class="mb-2">
                            Thành tiền: <strong><?php echo number_format($itemTotal, 0, ',', '.'); ?> VND</strong>
                        </p>

                        <div class="product-actions">
                            <a href="/webbanhang/Product/removeFromCart/<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
                               class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?');"
                               title="Xóa khỏi giỏ hàng">
                               <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <h4 class="text-primary">
                Tổng cộng: <strong><?php echo number_format($totalPrice, 0, ',', '.'); ?> VND</strong>
            </h4>
            <div>
                <button type="submit" class="btn btn-warning mr-2">Cập nhật số lượng</button>
                <a href="/webbanhang/Product/checkout" class="btn btn-primary">Thanh Toán</a>
            </div>
        </div>
    </form>

    <a href="/webbanhang/Product" class="btn btn-secondary mt-4">
        <i class="fas fa-arrow-left mr-1"></i> Tiếp tục mua sắm
    </a>

    <?php else: ?>
    <div class="alert alert-info text-center py-5">
        <i class="fas fa-shopping-cart fa-3x mb-3 text-info"></i>
        <h3 class="alert-heading">Giỏ hàng của bạn đang trống.</h3>
        <p>Hãy thêm sản phẩm vào giỏ hàng để tiếp tục mua sắm.</p>
        <a href="/webbanhang/Product" class="btn btn-info mt-2">
            <i class="fas fa-shopping-bag mr-1"></i> Mua sắm ngay
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
        background: #f8f9fa;
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

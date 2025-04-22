let previewContainer = document.querySelector('.products-preview');
let previewBoxes = previewContainer.querySelectorAll('.preview');

document.querySelectorAll('.products-container .product').forEach(product => {
    product.onclick = () => {
        // Hide all previews first
        previewBoxes.forEach(preview => {
            preview.classList.remove('active');
        });

        // Show the preview for the clicked product
        const productId = product.getAttribute('data-id');
        const targetPreview = document.querySelector(`.products-preview .preview[data-id="${productId}"]`);
        
        if (targetPreview) {
            targetPreview.classList.add('active');
            previewContainer.style.display = 'flex';
        }
    };
});

previewBoxes.forEach(close => {
    close.querySelector('.fa-times').onclick = () => {
        close.classList.remove('active');
        previewContainer.style.display = 'none';
    };
});

  // Redirect to invoice page with product details
    function buyNow(productId) {
        // Get product details from the preview
        const preview = document.querySelector(`.products-preview .preview[data-id="${productId}"]`);
        const productName = preview.querySelector('h3').innerText;
        const unitPrice = preview.querySelector('.price').innerText.replace('LKR ', '');
        
        // Redirect to invoice page with product details
        window.location.href = `invoice.php?product_name=${encodeURIComponent(productName)}&unit_price=${encodeURIComponent(unitPrice)}`;
    }
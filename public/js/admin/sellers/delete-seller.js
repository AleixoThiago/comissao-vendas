function confirmDelete(sellerId, sellerName) {
    if (confirm('Tem certeza de que deseja excluir ' + sellerName + '?')) {
        window.location.href = '/admin/delete/seller/' + sellerId;
    }
}

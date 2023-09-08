<!-- The Modal -->
<div class="modal fade" id="registerModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register As</h5>
            </div>
            <div class="modal-body"> 
                <div class = 'd-flex justify-content-center'>
                    <a style="margin: 10px;" class="btn btn-warning" href = '{{route("buyer.signup")}}'><i class="fa-solid fa-bag-shopping"></i> Buyer</a>
                    <a style="margin: 10px;" class="btn btn-success" href = '{{route("seller.signup")}}'><i class="fa-solid fa-store"></i> Seller</a>
                </div> 
            </div>
        </div>
    </div>
</div> 
<div class="modal fade" id="reviewmodalbuyer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
        <form id = "frmReviewBuyer">
        @csrf
        <input type = "hidden" id = "hidID" name = "hidID">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">WRITE A REVIEW</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-2">
                <div id = "cancelmsg"></div>
                <div class="row">
                    <div class="col-12">Overall Rating</div>
                    
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5"/>
                            <label for="star5" title="text" >5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text"   style = "margin-right: 5px">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text"   style = "margin-right: 5px">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text"   style = "margin-right: 5px">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text"  style = "margin-right: 5px">1 star</label>
                        </div>
                    </div>
                </div>
                <div class="row ml-3 mt-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for = 'customcomment'>What do you think about the product</label>
                            <textarea id = "customcomment" name = "customcomment" class = "form-control" rows = "5" placeholder = ""></textarea>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id = "btnreviewbuyer">Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>
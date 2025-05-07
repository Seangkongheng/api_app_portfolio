<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Logo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('brand.destroy')}}" method="POST">
          @csrf
          <div class="modal-body">
              <input type="hidden" name="brand_id" id="user_id">
              Are you sure you want to delete this Logo?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="summit"  class="btn btn-danger text-white ">Yes , Delete</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
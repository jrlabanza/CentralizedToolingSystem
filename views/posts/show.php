<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thank you</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Your appoinment has been successfully save!
      </div>
      <div class="modal-footer">
          <a href="?controller=pages&action=home"><input type="button"  class="btn btn-primary" value="OK" /></a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#exampleModal').modal('show');
    });
</script>
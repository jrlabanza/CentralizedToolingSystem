<form method="post" action="?controller=posts&action=addSocket" enctype="multipart/form-data">
  <div class="d-flex text-white">
    <div class="col-md-3 p-2 flex-fill bg-primary">
      <label for="name">SOCKET ID</label><input id="getTstID" name="lbID" type="text" class="form-control" required="">
      <label for="name">FAMILY</label><input id="getTstID" name="family" type="text" class="form-control" required="">
      <label for="name">DUT REQ.</label><input id="getTstID" name="dutReq" type="text" class="form-control" required="">
      <label for="name">TESTER PF</label><input id="getTstID" name="tstPF" type="text" class="form-control" required="">
    </div>
    <div class="col-md-3 p-2 flex-fill bg-primary">
      <label for="name">STATUS</label><input id="getTstID" name="status" type="text" class="form-control" required="">
      <label for="name">LOCATION</label><input id="getTstID" name="loc" type="text" class="form-control" required="">
      <label for="name">STORAGE</label><input id="getTstID" name="storage" type="text" class="form-control" required="">
      <label for="name">VENDOR</label><input id="getTstID" name="vendor" type="text" class="form-control" required="">
    </div>
    <div class="col-md-3 p-2 flex-fill bg-primary">
      <label for="name">LINE</label><input id="getTstID" name="line" type="text" class="form-control" maxlength="3" required="">
      <label for="name">PINT TYPE</label><input id="getTstID" name="storage" type="text" class="form-control" required="">
      <label for="name">PIN COUNT</label><input id="getTstID" name="vendor" type="text" class="form-control" required="">
      <label for="name">PART NUMBER</label><input id="getTstID" name="line" type="text" class="form-control" maxlength="3" required="">
    </div>
    <div class="col-md-3 p-2 flex-fill bg-primary">
      <label for="name">PACKAGE TYPE</label><input id="getTstID" name="storage" type="text" class="form-control" required="">
      <label for="name">SHOT COUNT</label><input id="getTstID" name="vendor" type="text" class="form-control" required="">
      <label for="name">SITE</label><input id="getTstID" name="line" type="text" class="form-control" maxlength="3" required="">
      <label for="name">SUPPORT FILE</label><input id="sfile" class="form-control" name="sfile" type="file" value="Choose file">
    </div>
  </div>
  <div class="d-flex text-white">
    <div class="col-md-12 p-2 flex-fill bg-primary">
      <label for="name">DESCRIPTION</label>
      <textarea id="getTstID" name="line" type="text" class="form-control" maxlength="3" required=""></textarea>
    </div>
  </div>
  <div class="modal-footer justify-content-center">
    <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
  </div>
</form>

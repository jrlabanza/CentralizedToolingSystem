  <!-- Button trigger modal -->
<button id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" style="display: none;" >
</button>

<!-- Modal -->
        <?php
          if(!empty($_SESSION['userEmail'])){
            echo '<form method="post" action="?controller=posts&action=saveSocket" enctype="multipart/form-data">
              <div class="col-xs-6 form-group">
                <div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SOCKET</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <div class="btn-group btn-group-toggle " data-toggle="buttons">
                              <label class="btn btn-outline-primary">
                                <input name="track" value="IN" id="trackIn" type="radio" autocomplete="off" required=""> TRACK IN
                              </label>
                              <label class="btn btn-outline-success">
                                <input name="track" value="OUT" id="trackOut" type="radio" autocomplete="off" required=""> TRACK OUT
                              </label>
                            </div>
                        </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label for="name">SOCKET ID:</label><input id="getLBID" name="socketid" type="text" class="form-control" readonly="" tabindex="-1">
                          <label for="name">FAMILY:</label><input id="getFam" name="family" type="text" class="form-control" readonly="" tabindex="-1">
                          <label for="name">VENDOR:</label><input id="getVen" name="vendor" type="text" class="form-control" readonly="" tabindex="-1">
                          <label for="name">DUT REQ:</label><input id="getDutReq" name="dutReq" type="text" class="form-control" readonly="" tabindex="-1">
                          <label for="name">TESTER PF:</label><input id="getTstPF" name="tstPf" type="text" class="form-control" readonly="" tabindex="-1">
                          <label for="name">LINE:</label><input id="getLine" name="line" type="text" class="form-control" readonly="" tabindex="-1">
                        </div>
                        <div class="col-md-6">
                          <label for="name">BORROWER :</label><input name="borrower" type="text" class="form-control" required="">
                          <label for="name">TESTER ID:</label><input id="getTstID" name="tstID" type="text" class="form-control" required="">
                          <label for="name">HANDLER ID:</label><input id="getHdID" name="hdID" type="text" class="form-control" required="">
                          <label for="name">STATUS:</label><select id="getStats" name="status" class="form-control" required="">
                            <option value="IN-GOOD">IN-GOOD</option>
                            <option value="IN-REPAIR">IN-REPAIR</option>
                            <option value="IN-FOR QUAL">IN-FOR QUAL</option>
                            <option value="OUT-PROD">OUT-PROD</option>
                            <option value="OUT-REPAIR">OUT-REPAIR</option>
                            <option value="OUT-ENGG">OUT-ENGG</option>
                            <option value="FOR SCRAP">FOR SCRAP</option>
                            <option value="PM">PM</option>
                          </select>
                          <label for="name">LOCATION:</label><input id="getLoc" name="loc" type="text" class="form-control" required="">
                          <label for="name">RACK:</label><input id="getStrg" name="storage" type="text" class="form-control" readonly="" tabindex="-1">
                         </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">SUPPORT FILE</span>
                            </div>
                            <div class="">
                              <!-- <input type="file" class="custom-file-input" id="inputGroupFile01" required=""> -->
                              <input id="sfile" class="form-control" name="sfile" type="file" value="Choose file">
                              <!-- <label class="custom-file-label" for="inputGroupFile01" >Choose file</label> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                    </div>';
          }else{
            echo '<form method="post" action="?controller=posts&action=signin" enctype="multipart/form-data">
            <div class="col-xs-6 form-group">
              <div class="modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">SOCKET</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                  <form class="dropdown-menu p-4 dropdown-menu-right" method="post" action="?controller=posts&action=signin">
                    <div class="form-group">
                      <label for="exampleDropdownFormEmail2">User name</label>
                      <input name="username" type="text" class="form-control" id="exampleDropdownFormEmail2">
                    </div>
                    <div class="form-group">
                      <label for="exampleDropdownFormPassword2">Password</label>
                      <input name="password" type="password" class="form-control" id="exampleDropdownFormPassword2">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                <label class="form-check-label" for="dropdownCheck2">
                  Remember me
                </label>
              </div>
              <button type="submit" class="btn btn-primary">Sign in</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>';
          }
        ?>

        </div>
      </div>
    </div>
  </div>
</form>

  <h2>SOCKET SECTION</h2>
  <div class="form-group">
    <div class="row">
      <div class="col-md-4"><label for="name">SOCKET ID:</label><input type="text" class="form-control" id="socketID"></div>
    </div>
  </div>
  <!-- <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav> -->
  <table id="keywords" class="table table-sm-responsive table-hover">
    <thead id="thead">
      <tr>
        <th scope="col" class="col-sm-1">LB ID</th>
        <th scope="col" class="col-sm-1">FAMILY</th>
        <th scope="col" class="col-sm-1">DUT REQ.</th>
        <th scope="col" class="col-sm-1">TST PF</th>
        <th scope="col" class="col-sm-1">STATUS</th>
        <th scope="col" class="col-sm-1">TST ID</th>
        <th scope="col" class="col-sm-1">HD ID</th>
        <th scope="col" class="col-sm-1">LOCATION</th>
        <th scope="col" class="col-sm-1">STORAGE</th>
        <th scope="col" class="col-sm-1">VENDOR</th>
        <th scope="col" class="col-sm-1">LINE</th>
        <th scope="col" class="col-sm-1">PIN TYPE</th>
        <th scope="col" class="col-sm-1">PIN COUNT</th>
        <th scope="col" class="col-sm-1">SHOT COUNT</th>
        <th scope="col" class="col-sm-1">MAX COUNT</th>
        <th scope="col" class="col-sm-1">SITE</th>
        <th scope="col" class="col-sm-1">DESCRIPTION</th>
        <th scope="col" class="col-sm-1">UPDATED</th>
      </tr>
    </thead>
    <tbody class="tbody">
        <?php foreach($posts as $post) {
          echo '<tr style="cursor: pointer;">
            <th class="lbID" scope="row">'.$post->lb_id.'</th>
            <td class="fam">'.$post->family.'</td>
            <td class="dut">'.$post->dut_req.'</td>
            <td class="tst">'.$post->tst_pf.'</td>
            <td class="stats">'.$post->status.'</td>
            <td class="tstID">'.$post->tester_id.'</td>
            <td class="hdID">'.$post->handler_id.'</td>
            <td class="loc">'.$post->loc.'</td>
            <td class="strg">'.$post->storage.'</td>
            <td class="ven">'.$post->vendor.'</td>
            <td class="line">'.$post->line.'</td>
            <td class="updated">'.$post->borrower.'</td>
          </tr>';
        } ?>
    </tbody>
  </table>
  <!-- <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav> -->
<!-- page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

    // Display the paging information
    echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';

    // Prepare the paged query
    $stmt = $dbh->prepare('
        SELECT
            *
        FROM
            table
        ORDER BY
            name
        LIMIT
            :limit
        OFFSET
            :offset
    ');

    // Bind the query params
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    // Do we have any results?
    if ($stmt->rowCount() > 0) {
        // Define how we want to fetch the results
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $iterator = new IteratorIterator($stmt);

        // Display the results
        foreach ($iterator as $row) {
            echo '<p>', $row['name'], '</p>';
        }

    } else {
        echo '<p>No results could be displayed.</p>';
    }

} catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
}
 -->

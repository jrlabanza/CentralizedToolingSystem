<div class="container-fluid">
  <div class="page-content">
    <div class="card">
      <div class="card-header">
        <h3>ADD ITEM INVENTORY</h3>
      </div>
      <div class="card-body">
        <div class="form-inline">
          <select id="addCategory" name='category' class="form-control">
          <?php if ($_SESSION['line'] == "LSI-FT"){ 
            if ($_SESSION['level'] > 1){?>
              <option value="" disabled selected>SELECT CATEGORY</option>
              <option value="LOADBOARD">LOAD BOARD</option>
              <option value="SOCKET">SOCKET</option>
              <option value="GNG">GONOGO</option>
              <option value="BIB">BURN IN BOARD</option>
              <option value="WP">WORK PRESS</option>
              <option value="SP">SPARE PARTS</option>
              <option value="NOZZLE">NOZZLE</option>
              <option value="CHIPMOUNT NOZZLE">CHIPMOUNT NOZZLE</option>
              <option value="IC">INSERT & CLAMP</option>
              <option value="MC">MOLD CHASE</option>
              <option value="SB">SOCKET BOARD</option>
              <option value="CK">CHANGE KIT</option>
              <option value="TP">TESTER PARTS</option>
              <option value="ATC">AUTO CORR</option>
              <option value="CABLE">CABLE</option>
              <option value="TT">TEST STAND</option>
              <option value="CB">CENTER BOARD</option>
              <option value="TFD">TRIM AND FORM DIESETS</option>
              <option value="RC">RUBBER COLLET</option>
              <option value="PG">PROGRAM</option>
              <option value="COLLET">METAL / VESPEL COLLET</option>
              <option value="SPANKER">SPANKER</option>
            <?php }else{ ?>
              <option value="" disabled selected>SELECT CATEGORY</option>
              <option value="SOCKET">SOCKET</option>
              <option value="GNG">GONOGO</option>
              <option value="BIB">BURN IN BOARD</option>
              <option value="WP">WORK PRESS</option>
              <option value="SP">SPARE PARTS</option>
              <option value="NOZZLE">NOZZLE</option>
              <option value="CHIPMOUNT NOZZLE">CHIPMOUNT NOZZLE</option>
              <option value="IC">INSERT & CLAMP</option>
              <option value="MC">MOLD CHASE</option>
              <option value="SB">SOCKET BOARD</option>
              <option value="CK">CHANGE KIT</option>
              <option value="TP">TESTER PARTS</option>
              <option value="ATC">AUTO CORR</option>
              <option value="CABLE">CABLE</option>
              <option value="TT">TEST STAND</option>
              <option value="CB">CENTER BOARD</option>
              <option value="TFD">TRIM AND FORM DIESETS</option>
              <option value="RC">RUBBER COLLET</option>
              <option value="PG">PROGRAM</option>
              <option value="COLLET">METAL / VESPEL COLLET</option>
              <option value="SPANKER">SPANKER</option>

          <?php }}else{ ?>
              <option value="" disabled selected>SELECT CATEGORY</option>
              <option value="LOADBOARD">LOAD BOARD</option>
              <option value="SOCKET">SOCKET</option>
              <option value="GNG">GONOGO</option>
              <option value="BIB">BURN IN BOARD</option>
              <option value="WP">WORK PRESS</option>
              <option value="SP">SPARE PARTS</option>
              <option value="NOZZLE">NOZZLE</option>
              <option value="CHIPMOUNT NOZZLE">CHIPMOUNT NOZZLE</option>
              <option value="IC">INSERT & CLAMP</option>
              <option value="MC">MOLD CHASE</option>
              <option value="SB">SOCKET BOARD</option>
              <option value="CK">CHANGE KIT</option>
              <option value="TP">TESTER PARTS</option>
              <option value="ATC">AUTO CORR</option>
              <option value="CABLE">CABLE</option>
              <option value="TT">TEST STAND</option>
              <option value="CB">CENTER BOARD</option>
              <option value="TFD">TRIM AND FORM DIESETS</option>
              <option value="RC">RUBBER COLLET</option>
              <option value="PG">PROGRAM</option>
              <option value="COLLET">METAL / VESPEL COLLET</option>
              <option value="SPANKER">SPANKER</option>

            <?php } ?>
          </select>
        </div>
      </div>
  </div>
  </div>

  <br>
  <div id="addItem">
  </div>
</div>

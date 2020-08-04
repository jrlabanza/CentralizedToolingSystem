<?php
  function call($controller, $action) {
    // require the file that matches the controller name
    require_once('controllers/' . $controller . '_controller.php');

    // create a new instance of the needed controller
    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'posts':
        // we need the model to query the database later in the controller
      require_once('models/post.php');
        $controller = new PostsController();
      break;

      // require_once('models/loadboard.php');
      //   $controller = new PostsController();
      // break;


    }

    // call the action
    $controller->{ $action }();
  }

  // just a list of the controllers we have and their actions
  // we consider those "allowed" values
  $controllers = array('pages' => ['home', 'error', 'trackInLB','lbPagination','socketPagination','socketBoardPagination','bibPagination','gngPagination','underCon',
  'trkLB','trkSocket','trkSocketBoard','trkBIB','trkGNG','manageUser','nozzlePagination','icPagination','mcPagination','wpPagination','atcPagination','testStandPagination',
  'cablePagination','ckPagination','cbPagination','trkCB','trkCable','trkTS','trkCK','trkATC','tpPagination', 'tfdPagination', 'rcPagination','spPagination', 'pizzaLB','pgPagination', 'trkPG', 'colletPagination', 'spankerPagination', 'chipnzlPagination'],
    // 'pages' => ['lb_home', 'error'],
    'posts' => ['lbHistory','socket','socketBoard','socketHistory','socketBoardHistory','bibHistory','gngHistory','nozzleHistory','icHistory','mcHistory','wpHistory','atcHistory',
    'testStandHistory','cableHistory','rcHistory','filtrLB','show','saveLB','saveSocket','saveSocketBoad','saveBIB','saveGNG','saveRC','signin','signout','addItem','editItem','delItem','addLB','addSocket',
    'addSocketBoard','addBIB','addGNG','addUser','delLB','delSocket','delSocketBoard','delBIB','delGNG','addNozzle','ckHistory','cbHistory','saveCB','saveCable','saveTS','tpHistory', 'tfdHistory','editRC','delRC',
    'spHistory', 'pgHistory', 'colletHistory', 'spankerHistory', 'chipnzlHistory']);


  // check that the requested controller and action are both allowed
  // if someone tries to access something else he will be redirected to the error action of the pages controller
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>

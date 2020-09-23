<?php

define('CONFIG', parse_ini_file('../data/config.ini'));

require_once '../src/kernel.php';


Route::hooks(function($service = null) {
  
  error_log(print_r($this->request,true));
  
  if ($service == 'sns') {
    error_log(print_r($this->request->data,true));
  } else {
    throw new Error('No Service');
  }
  exit();
});


/*** IMPLEMENTATION *******************************************************************************/


try {
  if (CONFIG['dev'] ?? false) include 'edit.php';

  $request   = new Request($_SERVER, 'index.html');
  
  header("Content-Type: {$request->mime}");
  
  if (is_file($request->uri)) {
    // php dev server handles static files too; prod this can config to cache as this would be done by http server
    $output = Response::load($request)->body;
    header('Content-Length: '. strlen($output));

  } else {

    // Set Application data
    $pages = Route::gather(glob('pages/*.*'));
    
    $data = [
      'pages'       => $pages, 
      'description' => 'Musings and work of Brendan Metzger.',
      'timestamp'   => new DateTime,
      'title'       => 'B.A.M.',
      'test'        => [['key' => 'A'], ['key' => 'B']],
    ];
    
    $response = new Response($request, $data);    
    $output   = Route::compose($response);

    if ($output instanceof Template) {
      $output = $output->render($response->data);
      if ($request->type == 'json'){
        $output = json_encode(simplexml_import_dom($output));
      }
    }
  }
  
} catch (Exception | Error $e) {

  http_response_code($e->getCode() ?: 400);
  // $toarr = (array)$e;
  $output = Request::open('error', [
    'wrapper' => CONFIG['DEV'] ?? null,
    'message' => $e->getMessage(),
    'code'    => $e->getCode(),
    'file'    => $e->getFile(),
    'line'    => $e->getLine(),
    'trace'   => array_reverse($e->getTrace()),
  ]);
  
} finally {

  echo $output;
  

}
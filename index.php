<?php

// Start development server with `php -S localhost:pppp index.php`

require_once 'src/diatom.php';

if (substr($_SERVER['SERVER_SOFTWARE'],0,3) == 'PHP') {
  require_once 'src/admin.php';
}


Route::hooks(function($service = null) {
  
  print_r($this->request);
  
  if ($service == 'sns') {
    $data = json_decode($this->request->data);
    error_log(print_r($data,true));
  } else {
    throw new Error('No Service');
  }
  exit();
});

/*** IMPLEMENTATION *******************************************************************************/

try {
  $request   = new Request($_SERVER, 'index.html');
  
  header("Content-Type: {$request->mime}");
  
  if (file_exists($request->uri)) {
    
    $output = Response::load($request)->body;
    header('Content-Length: '. strlen($output));
    
  } else {
    
    // Set Application data
    $data = [
      'pages'       => Response::gather(glob('pages/*.*')), 
      'description' => 'Musings, whatnot.',
      'timestamp'   => new DateTime,
      'title'       => 'BAM',
      'request'     => $request->uri,
    ];
    
    $response = new Response($request);
    $output   = Route::compose($response);

    if ($output instanceof Template) {
      $output = $output->render($response->merge($data));
    }
        
    if ($request->type == 'json'){
      $output = json_encode(simplexml_import_dom($output));
    }
    
  }
  
} catch (Exception | Error $e) {

  http_response_code($e->getCode() ?: 400);

  $output = Request::GET('error')->render([
    'wrapper' => 'txmt://open',
    'message' => $e->getMessage(),
    'code'    => $e->getCode(),
    'file'    => $e->getFile(),
    'line'    => $e->getLine(),
    'trace'   => array_reverse($e->getTrace()),
  ]);
  
} finally {

  echo $output;
  
}
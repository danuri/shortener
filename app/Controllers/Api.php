<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\LinksModel;

class Api extends ResourceController
{
    protected $modelName = 'App\Models\LinksModel';
    protected $format    = 'json';

    public function index()
    {
        //
    }

    public function create()
    {
      $header = $this->request->header('x-key');
      if($header != 'X-Key: asdasd'){
        return $this->respond(['message'=>'unauthorized']);
      }

      $model = new LinksModel;

      if (! $this->validate([
            'url' => "required",
        ])) {
          return $this->respond(['message'=>'URL not valid']);
        }

      $url = $this->request->getVar('url');
      $host = $this->request->header('host');
      $code = random_string('alnum', 5);

      $param = [
        'code' => $code,
        'url' => $url,
        'host' => $host,
      ];

      $insert = $model->insert($param);

      $link = 'https://ropeg.kemenag.go.id/s/'.$code;

      return $this->respond(['message'=>'ok','link'=>$link]);
    }
}

<?php

namespace App\Controllers;

use App\Models\LinksModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function link($id)
    {
      $model = new LinksModel;
      $link = $model->where(['code'=>$id])->first();

      echo $link->url;
      // header("Location: $link->url");
      // redirect()->to($link->url);
    }
}

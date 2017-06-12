<?php

namespace App\Services\Html;

class PanelBuilder
{

  protected $type;
  protected $head;
  protected $body;
  protected $foot;

  public function __construct($type = 'default', $head = null, $body = null, $foot = null)
  {
    $this->type = $type;
    $this->head = $head;
    $this->body = $body;
    $this->foot = $foot;
  }

  public function __toString()
  {
    $s = '<div class="panel panel-'.$this->type.'">';
    if ($this->head)
    {
      $s .= '<div class="panel-heading">'.$this->head.'</div>';
    }
    if ($this->body)
    {
      $s .= '<div class="panel-body">'.$this->body.'</div>';
    }
    if ($this->foot)
    {
      $s .= '<div class="panel-footer">'.$this->foot.'</div>';
    }
    $s .= "</div>";
    return $s;
  }

  public function type($type)
  {
    $this->type = $type;
    return $this;
  }

  public function head($head)
  {
    $this->head = $head;
    return $this;
  }

  public function body($body)
  {
    $this->body = $body;
    return $this;
  }

  public function footer($foot)
  {
    $this->foot = $foot;
    return $this;
  }

}

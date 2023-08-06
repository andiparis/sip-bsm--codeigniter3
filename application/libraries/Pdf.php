<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property load_html $load_html
 *  @property render $render
 *  @property stream $stream
 */

use Dompdf\Dompdf;

class Pdf extends Dompdf {

  public $filename;

  public function __construct() {
    parent::__construct();
    $this->filename = "certificate.pdf";
  }

  protected function ci() {
    return get_instance();
  }

  public function load_view($view, $data = array()) {
    $html = $this->ci()->load->view($view, $data, TRUE);
    $this->set_option('isRemoteEnabled', TRUE);
    $this->loadHtml($html);
    $this->render();
    return $this->output(); // Return the generated PDF content
  }
}
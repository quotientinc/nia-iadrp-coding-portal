<?php

namespace Drupal\autocode_test\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for autocode_test routes.
 */
class AutocodeTestController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}

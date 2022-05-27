<?php

namespace Drupal\field_demo;

use Drupal\Core\Session\AccountProxy;

/**
 * NameService is a simple example of a Drupal 8/9 service.
 */
class NameService {

  private $currentUser;

  /**
   * Part of the DependencyInjection happening here.
   */
  public function __construct(AccountProxy $currentUser) {
    $this->currentUser = $currentUser;
  }

  /**
   * Returns a a Drupal user as an owner.
   */
  public function whoAreYou() {
    return $this->currentUser->getDisplayName();
  }

}

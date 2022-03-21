<?php

namespace Drush\Commands\drush_blackfire;

use Drush\Commands\DrushCommands;

/**
 * Edit this file to reflect your organization's needs.
 */
class CheckBlackfireCommands extends DrushCommands {

  /**
   * @command blackfire:version
   *
   * Demonstrates the use of notices, warnings and debug messages
   * in commands.
   */
  public function versionCommand() {
    $this->logger()->notice(dt('Blackfire SDK Client version %version', [
      '%version' => \Blackfire\Client::VERSION,
    ]));
  }

}

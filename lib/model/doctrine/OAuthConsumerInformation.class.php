<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

class OAuthConsumerInformation extends BaseOAuthConsumerInformation
{
  public function preSave($event)
  {
    if (!$this->exists())
    {
      $this->key_string = opToolkit::generatePasswordString(16, false);
      $this->secret = opToolkit::generatePasswordString(32);
    }
  }
}
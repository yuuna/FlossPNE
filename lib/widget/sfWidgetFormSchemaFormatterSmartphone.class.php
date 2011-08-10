<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * sfWidgetFormSchemaFormatterSmartphone
 *
 * @package    OpenPNE
 * @subpackage widget
 * @author     Tozuka <tozuka@tejimaya.com>
 */
class sfWidgetFormSchemaFormatterSmartphone extends opWidgetFormSchemaFormatter
{
  protected
    $rowFormat                 = "%label%\n%field%%help%%hidden_fields%%error%",
    $errorListFormatInARow    =  '%errors%',
    $helpFormat                = '%help%',
    $errorRowFormatInARow      = "<br>%error%\n",
    $namedErrorRowFormatInARow = "<br>%name%: %error%\n",
    $decoratorFormat           = "<div data-role=\"fieldcontain\">\n  %content%</div>";
}

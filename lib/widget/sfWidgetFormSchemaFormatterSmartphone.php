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
 * @author     Tajima Itsuro <tajima@tejimaya.com>
 */
class sfWidgetFormSchemaFormatterSmartphone extends opWidgetFormSchemaFormatter
{
  protected
    $helpFormat            = '<div class="help">%help%</div>',
    $errorListFormatInARow = "  <div class=\"error\"><ul class=\"error_list\">\n%errors%  </ul></div>\n";
}

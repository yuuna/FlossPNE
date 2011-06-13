<?php

/**
 * diary actions.
 *
 * @package    OpenPNE
 * @subpackage diary
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 *
 * this should be placed under plugins/opDiaryPlugin/apps/smartphone_frontend/modules/diary/actions/
 */
class diaryActions extends opDiaryPluginDiaryActions
{
  public function executeShow(sfWebRequest $request)
  {
    $diaryComment = new DiaryComment();

    $this->form = new DiaryCommentForm($diaryComment);

    return parent::executeShow($request);
  }
}
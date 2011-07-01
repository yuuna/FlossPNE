<?php slot('title', __('Post a diary')) ?>

<?php if (Doctrine::getTable('SnsConfig')->get('op_diary_plugin_use_email_post', true)): ?>
<!-- [i:106] --><?php echo str_replace('mailto:', 'sms:', op_mail_to('mail_diary_create', array(), __('Post via MMS'))) ?><br>
<?php echo __('You can attach photo files to MMS.') ?><br>
<?php endif; ?>

<hr />

<?php
#$options['url'] = url_for('diary_create');
#$options['button'] = __('Save');
#op_include_form('formDiary', $form, $options);
?>

<form action="<?php echo url_for('@diary_create') ?>" method="post">
  <!-- <strong>*</strong>は必須項目です。-->
 
  <label for="diary_title">タイトル</label>
  <input size="40" type="text" name="diary[title]" class="input_text" id="diary_title" />

  <label for="diary_body">本文</label>
  <textarea rows="10" cols="50" name="diary[body]" id="diary_body"></textarea>

  <span align="center">
  <fieldset data-role="controlgroup" data-type="horizontal">
    <input type="radio" name="diary[public_flag]" id="public_flag_choice_4" value="4" />
    <label for="public_flag_choice_4">Web全体</label>
    <input type="radio" name="diary[public_flag]" id="public_flag_choice_1" value="1" checked="checked" />
    <label for="public_flag_choice_1">全員</label>
    <input type="radio" name="diary[public_flag]" id="public_flag_choice_2" value="2" />
    <label for="public_flag_choice_2">友達</label>
    <input type="radio" name="diary[public_flag]" id="public_flag_choice_3" value="3" />
    <label for="public_flag_choice_3">非公開</label>
  </fieldset>
  </span>

  <input type="hidden" name="diary[<?php echo $form->getCSRFFieldName() ?>]" value="<?php echo $form->getCSRFToken() ?>" />
  <button type="submit" data-theme="a">投稿</button>
</form>


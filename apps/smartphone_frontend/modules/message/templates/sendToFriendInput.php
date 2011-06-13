<div data-role="header" data-theme="b">
  <h1><?php echo __('メッセージを書く') ?></h1>
  <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
</div>

<div data-role="content">
  <form action="<?php echo url_for('message/sendToFriend') ?>" method="post" data-ajax="false" >

  <ul data-role="listview">
    <li>

  <div data-role="fieldcontain">
    <label for="message_subject">件名</label>
    <input type="text" name="message[subject]" id="message_subject" /><br />
    <label for="message_body">本文</label>
    <textarea rows="4" cols="30" name="message[body]" id="message_body"></textarea>
<!--
    <input type="hidden" name="message[id]" id="message_id" />
    <input type="hidden" name="message[thread_message_id]" id="message_thread_message_id" />
    <input type="hidden" name="message[return_message_id]" id="message_return_message_id" />
    <input type="hidden" name="message[image1][id]" id="message_image1_id" />
    <input type="hidden" name="message[image2][id]" id="message_image2_id" />
    <input type="hidden" name="message[image3][id]" id="message_image3_id" />
-->
    <input type="hidden" name="message[send_member_id]" id="message_send_member_id"
      value="<?php echo $sendMember->getId() ?>" />
    <input type="hidden" name="message[<?php echo $form->getCSRFFieldName() ?>]" value="<?php echo $form->getCSRFToken() ?>" id="message__csrf_token" />

    <input type="submit" class="input_submit" value="送信" data-theme="a" /> 
    <input type="submit" class="input_submit" value="下書き保存" name="is_draft" data-theme="b" /> 
    </div>
    </li>
  </ul>
  </form>
</div>

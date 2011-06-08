<style>
 dt { font-weight: bold; font-size: 11pt; padding-bottom: 3px;  }
 dd { font-weight: normal; font-size: 10pt;  padding-left: 16px; padding-bottom: 16px; }
pre { padding-left: 18px; padding-top: 3px; padding-bottom: 3px; color: #06F; }
p { padding: 0.5em; }
</style>

<div data-role="page" id="toc">
  <div data-role="header" data-theme="b">
    <h1>OpenPNEのスマートフォン対応について</h1>
    <!-- <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a> -->
  </div>

  <div data-role="content">

  <span align="right">2011/6/9 tozuka@tejimaya.com</span>
  
  <ul data-role="listview" data-inset="true">
    <li data-role="list-divider">目次</li>
    <li><a href="#ubee">うべー</a></li>
    <li>うぼー</li>
    <li>うばー</li>
    <li><a href="#faq">FAQ</a></li>
     <!--
    <li>はじめに</li>
    <li>対応機種</li>
    <li>実装方針</li>
    <li>ロードマップ</li>
     -->
  </ul>

<!--
  <div data-role="collapsible" data-collapsed="true">
    <h3>対応機種</h3>
  </div>
-->
  </div>
</div>


<div data-role="page" id="faq">
  <div data-role="header" data-theme="b">
    <h1>FAQ</h1>
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
  </div>
  <div data-role="content">
    <dl>
      <dt>ライブラリは何を使っていますか</dt>
      <dd><a href="http://jquerymobile.com/">jQuery Mobile</a> を使っています。<br/>
          まだα版ですが、わりと良いと思います。</dd>

      <dt>対応機種は？</dt>
      <dd>jQuery Mobile が対応している機種であれば何でも行けるのではないかと思います（※未確認）。</dd>

      <dt>コントローラやアクションは pc_frontend の物がそのまま流用できますか？</dt>
      <dd>ある程度は可能です。但し、ビューはスマートフォン用に書き直しています。</dd>

      <dt>既に公開されていますか？</dt>
      <dd>github では未公開ですが、とりあえず dazai2 の gitosis に置いてあります。<br/>
          <pre>$ git clone git@dazai2.pne.jp:tz-smartphone.git</pre>
          で行けると思います。tz-smartphone-20110603 というブランチで作業しています。</dd>

      <dt>本線との合流予定は？</dt>
      <dd>未定ですが、これを叩き台にして本線のスマートフォン対応が進めばと思います。</dd>
    </dl>
  </div>
</div>


<div data-role="page" id="ubee">
  <div data-role="header" data-theme="b">
    <h1>うべー</h1>
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
  </div>

  <div data-role="content">
    <p>療養中に熱にうなされて夢の中で smartphone_frontend をがががーっと実装していたのをどうにかしたくて作りました。</p>
    
    <p>とりあえず動くものが出来てきたのでお見せしたいと思います。</p>
  
    </div>
</div>

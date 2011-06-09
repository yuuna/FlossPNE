<style>
  p { padding: 0.5em; }
</style>

<div data-role="page" id="toc">
      <div data-role="header" data-theme="b">
      <h1>OpenPNEのスマートフォン対応について</h1>
      <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
      </div>

      <div data-role="content">
      <div data-role="collapsible" data-collapsed="false">
      <h3>はじめに</h3>
      <p>
      療養中に熱にうなされて夢の中で smartphone_frontend をがががーっと実装していたのをどうにかしたくて作りました。<br />
      とりあえず動くものが出来てきたのでお見せしたいと思います。<br />
      <br />
      2011年6月9日 Naoya Tozuka <tozuka@tejimaya.com>
      </p>
      </div>

      <div data-role="collapsible" data-collapsed="true">
      <h3>デモ環境</h3>
      <p>
      <a href="http://sf.inner.tejimaya.com/" target="_blank">http://sf.inner.tejimaya.com/</a> で、スマートフォンから inner にアクセスできます。（要innerアカウント）<br />
      <br />
      書き込んだ結果はinnerに反映されますのでご注意ください。</p>
      </div>

      <div data-role="collapsible" data-collapsed="true">
      <h3>対応状況</h3>
      <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">認証</li>
      <li><p>
      現状ではパスワード認証のみ。<br/>
      ログイン・ログアウトともに可能。<br/>
      失敗した場合のフローを実装してない＞＜</p></li>

      <li data-role="list-divider">メッセージ</li>
      <li><p>
      過去に送受信したメッセージ、下書き、ゴミ箱にあるメッセージの一覧および個別表示に対応済。<br/>
      メッセージ送信はこれから対応します。</p></li>

      <li data-role="list-divider">アクティビティ</li>
      <li><p>
      表示・投稿ともに可能。<br/>
      アクティビティからのIDコールが可能であることを確認済。
      </p></li>

      <li data-role="list-divider">日記</li>
      <li><p>
      自他の日記の表示、コメント投稿が可能。<br/>
      日記投稿に対応。<br/>
      過去の日記の編集には未対応。<br/>
      画像投稿に未対応。（MMS経由での投稿になると思われるが、スマートフォンのメールアドレスを登録できるようにしないといけない）
      </p></li>

      <li data-role="list-divider">メンバー＆フレンド</li>
      <li><p>
      フレンドリスト表示可能。<br/>
      メンバー検索に未対応。<br/>
      フレンド招待機能はまだありません。
      </p></li>

      <li data-role="list-divider">コミュニティ</li>
      <li><p>
      コミュニティ検索に未対応。<br/>
      新着トピック、新着イベントの一覧および個別閲覧が可能。<br/>
      コメント投稿に未対応（もうすぐ付きます）<br/>
      参加コミュニティ一覧は見られるが、コミュニティ個々の詳細がまだ見られない。
      </p></li>

      <li data-role="list-divider">プロフィール</li>
      <li><p>
      自他のプロフィールの閲覧は可能。<br/>
      プロフィール編集は未対応。<br/>
      プロフィール画像のアップロードにも未対応。
      </p></li>

      <li data-role="list-divider">あしあと</li>
      <li><p>
      あしあと履歴の閲覧は可能。<br/>
      スマートフォンでアクセスしている際にはあしあとが付くのだろうか（※未確認）
      </p></li>

      <li data-role="list-divider">お気に入り</li>
      <li><p>未対応。</p></li>

      <li data-role="list-divider">ランキング</li>
      <li><p>未対応。</p></li>

      <li data-role="list-divider">設定変更</li>
      <li><p>未対応。</p></li>
      </ul>
      </div>

      <div data-role="collapsible" data-collapsed="true">
      <h3>既知の不具合</h3>
      <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">認証</li>
      <li><p>
      パスワードを間違えても何も言ってくれない
      </p></li>
      <li data-role="list-divider">日記</li>
      <li><p>
      <s>非公開にしたはずの日記がWeb全体に公開になってしまう</s> →修正済(6/8)
      </p></li>
      </ul>
      </div>

      <div data-role="collapsible" data-collapsed="true">
      <h3>TODO</h3>
      <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">プラグインのものはプラグインの下へ？</li>
      <li><p>
      日記、あしあと、コミュニティトピック等、個々のプラグインの apps/smartphone_frontend で対応すべきかと思われるものもまとめて対応しています。これらは移動すべき？<br/>
      というか、プラグインの有無によってメニューに現れたり現れなかったりとか<br/>
      そもそもメニューのレイアウトをbackendで出来るようにしたいとか
      </p></li>
      <li data-role="list-divider">投稿系の充実</li>
      <li><p>
      メッセージを送ったり
      </p></li>
      <li data-role="list-divider">新着通知まわり</li>
      <li><p>
      自分宛のメッセージ、コメントがあるときの赤文字表示<br/>
      新着の日記、コメント、アクティビティがあるときの件数表示
      </p></li>
      <li data-role="list-divider">アクティビティ</li>
      <li><p>
      アクティビティから日記等へのリンクがまだない<br/>
      SNS内名称の置換に未対応なので %community% のような文字列がそのまま見える
      </p></li>
      <li data-role="list-divider">コミュニティ</li>
      <li><p>
      <s>新着一覧に画像つけるの忘れてるのであとでつける</s> →6/9<br/>
      <s>トピやイベントへのコメントとか</s> →6/9<br />
      <s>コミュニティ詳細(home)ページ</s> →6/9とりあえず表示。詳細情報入れていきます<br/>
      新規コミュ立ち上げとか<br/>
      新規トピック、新規イベントの作成とか
      </p></li>
      </ul>
      </div>

      <div data-role="collapsible" data-collapsed="true">
      <h3>FAQ</h3>
      <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">ライブラリは何を使っていますか</li>
      <li><p>
      <a href="http://jquerymobile.com/">jQuery Mobile</a> を使っています。<br/>
      まだα版ですが、わりと良いと思います。
      </p></li>

      <li data-role="list-divider">対応機種は？</li>
      <li><p>
      jQuery Mobile が対応している機種であれば何でも行けるのではないかと思います（※未確認）。<br/>
      → Apple iOS (3.1-4.2: iPhone, iPod Touch, iPad), Android (1.6-2.3), Blackberry 6, Windows Phone 7, Palm WebOS (1.4), Opera Mobile (10.1), Opera Mini (5.02), Firefox Mobile (beta)
      </p></li>

      <li data-role="list-divider">コントローラやアクションは pc_frontend の物がそのまま流用できますか？</li>
      <li><p>
      lib/action/ にあるベースクラスは流用しています。<br/>
      ビューはスマートフォン用に書き直しています。
      </p></li>

      <li data-role="list-divider">既に公開されていますか？</li>
      <li><p>
      とりあえず dazai2 の gitosis に置いてあります。<br/>
      <tt>$ git clone git@dazai2.pne.jp:tz-smartphone.git</tt><br/>
      で行けると思います。<br/>
      tz-smartphone-20110603 というブランチで作業しています。<br/>
      github にももうすぐアップします。forkして遊んでみてください。
      </p></li>

      <li data-role="list-divider">本線との合流予定は？</li>
      <li><p>
      未定ですが、これを叩き台にして本線のスマートフォン対応が進めばと思います。<br/>
      とか言ってもまあ apps/smartphone_frontend と幾つかのファイルをコピーするだけでマージできちゃうので簡単かも。
      </p></li>
      </ul>
      </div><!-- collapsible -->
      </div><!-- content -->
</div><!-- page -->

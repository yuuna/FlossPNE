<style>
 dt { font-weight: bold; font-size: 11pt; padding-bottom: 3px;  }
 dd { font-weight: normal; font-size: 10pt;  padding-left: 16px; padding-bottom: 16px; }
pre { color: #06F; }
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
      2011年6月9日 Naoya Tozuka &lt;tozuka@tejimaya.com&gt;
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
        <li>現状ではパスワード認証のみ。</li>
        <li>ログイン・ログアウトともに可能。</li>
        <li>失敗した場合のフローを実装してない＞＜</li>
                                        
        <li data-role="list-divider">メッセージ</li>
        <li>過去に送受信したメッセージ、下書き、ゴミ箱にあるメッセージの一覧および個別表示に対応済。</li>
        <li>メッセージ送信はこれから対応します。</li>
                                        
        <li data-role="list-divider">アクティビティ</li>
        <li>表示・投稿ともに可能。</li>
        <li>アクティビティからのIDコールが可能であることを確認済。</li>
                                        
        <li data-role="list-divider">日記</li>
        <li>自他の日記の表示、コメント投稿が可能。</li>
        <li>日記投稿に対応。</li>
        <li>過去の日記の編集には未対応。</li>
        <li>画像投稿に未対応。（MMS経由での投稿になると思われるが、スマートフォンのメールアドレスを登録できるようにしないといけない）</li>
                                        
        <li data-role="list-divider">メンバー＆フレンド</li>
        <li>メンバー検索に未対応。</li>
        <li>フレンドリスト表示可能。</li>
        <li>フレンド招待機能はまだありません。</li>

        <li data-role="list-divider">コミュニティ</li>
        <li>コミュニティ検索に未対応。</li>
        <li>新着トピック、新着イベントの一覧および個別閲覧が可能。</li>
        <li>コメント投稿に未対応（もうすぐ付きます）</li>
        <li>参加コミュニティ一覧は見られるが、コミュニティ個々の詳細がまだ見られない。</li>

        <li data-role="list-divider">プロフィール</li>
        <li>自他のプロフィールの閲覧は可能。</li>
        <li>プロフィール編集は未対応。</li>
        <li>プロフィール画像のアップロードにも未対応。</li>

        <li data-role="list-divider">あしあと</li>
        <li>あしあと履歴の閲覧は可能。</li>
        <li>スマートフォンでアクセスしている際にはあしあとが付くのだろうか（※未確認）</li>
                                        
        <li data-role="list-divider">お気に入り</li>
        <li>未対応。</li>
                                        
        <li data-role="list-divider">ランキング</li>
        <li>未対応。</li>
                                        
        <li data-role="list-divider">設定変更</li>
        <li>未対応。</li>
        </ul>
    </div>
                                        

    <div data-role="collapsible" data-collapsed="true">
      <h3>既知の不具合</h3>
        <ul data-role="listview" data-inset="true">
        <li data-role="list-divider">認証</li>
        <li>パスワードを間違えても何も言ってくれない</li>
        <li data-role="list-divider">日記</li>
        <li>非公開にしたはずの日記がWeb全体に公開になってしまう</li>
        </ul>
    </div>

                                        
    <div data-role="collapsible" data-collapsed="true">
      <h3>TODO</h3>
        <ul data-role="listview" data-inset="true">
        <li data-role="list-divider">プラグインのものはプラグインの下へ？</li>
        <li>日記、あしあと、コミュニティトピック等、個々のプラグインの apps/smartphone_frontend で対応すべきかと思われるものもまとめて対応しています。これらは移動すべき？</li>
        <li data-role="list-divider">投稿系の充実</li>
        <li>コミュニティを作ったり</li>
        <li>コミュニティにトピックやイベントを作成したり</li>
        <li>コメントしたり</li>
        <li>メッセージを送ったり</li>
        <li data-role="list-divider">既知の不具合</li>
        <li>非公開にしたはずの日記がWeb全体に公開になってしまう</li>
        </ul>
    </div>

                                        
    <div data-role="collapsible" data-collapsed="true">
      <h3>FAQ</h3>
        <ul data-role="listview" data-inset="true">
        <li data-role="list-divider">ライブラリは何を使っていますか</li>
        <li>jQuery Mobile (http://jquerymobile.com/) を使っています。</li>
        <li>まだα版ですが、わりと良いと思います。</li>

        <li data-role="list-divider">対応機種は？</li>
        <li>jQuery Mobile が対応している機種であれば何でも行けるのではないかと思います（※未確認）。</li>

        <li data-role="list-divider">コントローラやアクションは pc_frontend の物がそのまま流用できますか？</li>
        <li>ある程度は可能です。但し、ビューはスマートフォン用に書き直しています。</li>

        <li data-role="list-divider">既に公開されていますか？</li>
        <li>とりあえず dazai2 の gitosis に置いてあります。</li>
        <li><pre>$ git clone git@dazai2.pne.jp:tz-smartphone.git</pre> で行けると思います。</li>
        <li>tz-smartphone-20110603 というブランチで作業しています。</li>
        <li>github にももうすぐアップします。forkして遊んでみてください。</li>

        <li data-role="list-divider">本線との合流予定は？</li>
        <li>未定ですが、これを叩き台にして本線のスマートフォン対応が進めばと思います。</li>
        </ul>
    </div>

  </div>
</div>

<?php
/**
 * Footer template — site footer + global modals.
 *
 * @package Ludoa
 */
?>

  <!-- ============================================================
       FOOTER
       ============================================================ -->
  <footer class="site-footer">
    <div class="footer__inner container">
      <!-- Footer Top Call to Action -->
      <div class="footer__cta">
        <h2 class="footer__cta-title" data-i18n="footer.cta_title">
          病気になる前の段階から生活習慣を見直す<br />
          <span class="footer__cta-highlight">本当の健康づくりは、ここから始まります。</span>
        </h2>
        <div class="footer__cta-buttons">
          <a href="#pricing" class="btn-footer btn-footer--primary js-reserve">
            <span data-i18n="footer.reserve">今すぐ予約する</span>
          </a>
          <a href="#contact" class="btn-footer btn-footer--outline js-contact">
            <span data-i18n="footer.contact">お問い合わせ・ご相談はこちら</span>
          </a>
        </div>
      </div>

      <hr class="footer__divider" />

      <!-- Footer Bottom Columns -->
      <div class="footer__bottom">
        <!-- Left: Brand Info -->
        <div class="footer__brand">
          <p class="logo logo--footer"><span>大自然</span><span class="logo__aso">阿蘇</span><span> 健康の森</span></p>
          <p class="footer__address" data-i18n="footer.address">〒869-1404 熊本県阿蘇郡南阿蘇村河陽5579-3</p>
          
          <div class="footer__contact">
            <a href="tel:0967-67-3737" class="footer__phone">
              <svg class="footer__phone-icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_313_613)">
                  <path d="M2.5 4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H6.9C7.07483 2.50013 7.24519 2.55525 7.38696 2.65754C7.52874 2.75984 7.63475 2.90413 7.69 3.07L8.93833 6.81417C9.00158 7.00445 8.9941 7.21116 8.91726 7.39637C8.84042 7.58158 8.69938 7.73288 8.52 7.8225L6.63917 8.76417C7.5611 10.8046 9.19538 12.4389 11.2358 13.3608L12.1775 11.48C12.2671 11.3006 12.4184 11.1596 12.6036 11.0827C12.7888 11.0059 12.9956 10.9984 13.1858 11.0617L16.93 12.31C17.096 12.3653 17.2404 12.4714 17.3427 12.6134C17.445 12.7553 17.5 12.9259 17.5 13.1008V15.8333C17.5 16.2754 17.3244 16.6993 17.0118 17.0118C16.6993 17.3244 16.2754 17.5 15.8333 17.5H15C8.09667 17.5 2.5 11.9033 2.5 5V4.16667Z" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                  <clipPath id="clip0_313_613">
                    <rect width="20" height="20" fill="white"/>
                  </clipPath>
                </defs>
              </svg>
              <span>0967-67-3737</span>
            </a>
            <p class="footer__hours" data-i18n="footer.hours">年中無休／予約受付時間 9:00〜17:00</p>
          </div>
        </div>

        <!-- Right: Links Grid -->
        <nav class="footer__nav" aria-label="フッターナビゲーション">
          <div class="footer__nav-list">
            <a href="#program" class="footer__nav-link footer__nav-link--full" data-i18n="footer.nav_program">滞在型健康増進プログラムとは</a>
            <a href="#supervision" class="footer__nav-link footer__nav-link--full" data-i18n="footer.nav_supervision">日本健康増進学術機構による総合監修</a>
            <a href="#fields" class="footer__nav-link footer__nav-link--full" data-i18n="footer.nav_fields">健康プログラムを構成する6つの分野</a>
            <a href="#wishes" class="footer__nav-link" data-i18n="footer.nav_wishes">家族への想い</a>
            <a href="#pricing" class="footer__nav-link" data-i18n="footer.nav_pricing">宿泊プランと料金</a>
            <a href="#access" class="footer__nav-link" data-i18n="footer.nav_access">アクセス</a>
            <a href="#faq" class="footer__nav-link" data-i18n="footer.nav_faq">よくある質問</a>
            <a href="#contact" class="footer__nav-link js-contact" data-i18n="footer.nav_contact">お問い合わせ・ご相談</a>
            <a href="#" class="footer__nav-link" data-i18n="footer.nav_privacy">プライバシーポリシー</a>
          </div>
        </nav>
      </div>

      <!-- Copyright -->
      <div class="footer__copyright">
        <p>&copy; 2026 Kenko no Mori. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <!-- ============================================================
       SUPERVISION / FIELD 1 '学' MODAL
       ============================================================ -->
  <div id="modal-field-1" class="modal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal__overlay js-modal-close"></div>
    <div class="modal__container">
      <!-- Close Button Top Right -->
      <button type="button" class="modal__close-btn js-modal-close" aria-label="閉じる">
        <svg viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="16" cy="16" r="14" />
          <path d="M11 11l10 10M21 11L11 21" />
        </svg>
      </button>

      <div class="modal__content">
        <!-- Watermark Kanji "学" -->
        <div class="modal__watermark" aria-hidden="true">学</div>

        <!-- Top Section: Title, Intro & Image -->
        <div class="modal__top">
          <div class="modal__intro">
            <h3 class="modal__title" data-i18n="modal.field1.title">ご夫婦で学び、<br>自分の体を知る</h3>
            <div class="modal__text">
              <p data-i18n="modal.field1.p1">健康づくりは、まず自分の体を知ることから始まります。<br>日本健康増進学術機構の監修のもと、<br>食事・運動・心のケア・認知機能への配慮など、<br>これからの暮らしに役立つ内容を、<br>テーマごとのカリキュラムでわかりやすく学びます。</p>
              <p data-i18n="modal.field1.p2">また、各種測定を通して、現在の体の状態や、<br>これから気をつけたいポイントを確認できます。<br>ご夫婦それぞれの状態を知ることで、<br>これからの生活習慣を一緒に見直すきっかけになります。</p>
            </div>
          </div>
          <div class="modal__image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-01.jpg" alt="" />
          </div>
        </div>

        <!-- Middle Section: 4 Habits -->
        <div class="modal__habits-section">
          <p class="modal__habits-subtitle" data-i18n="modal.field1.habits_subtitle">健康キャンパスで学ぶ</p>
          <h4 class="modal__habits-title" data-i18n="modal.field1.habits_title">4つの<span class="text-gold">健康習慣</span></h4>
          <span class="modal__habits-divider"></span>

          <div class="modal__habits-grid">
            <!-- Card 1 -->
            <div class="habit-card">
              <div class="habit-card__badge">食</div>
              <h5 class="habit-card__title" data-i18n="modal.field1.card1_title">食生活</h5>
              <p class="habit-card__desc" data-i18n="modal.field1.card1_desc">毎日の食事バランスを見直し、無理なく続けられる食習慣を学びます。</p>
            </div>
            <!-- Card 2 -->
            <div class="habit-card">
              <div class="habit-card__badge">動</div>
              <h5 class="habit-card__title" data-i18n="modal.field1.card2_title">運動</h5>
              <p class="habit-card__desc" data-i18n="modal.field1.card2_desc">ご自身の体力に合わせて、日常的な運動習慣を身につけます。</p>
            </div>
            <!-- Card 3 -->
            <div class="habit-card">
              <div class="habit-card__badge">心</div>
              <h5 class="habit-card__title" data-i18n="modal.field1.card3_title">心の健康</h5>
              <p class="habit-card__desc" data-i18n="modal.field1.card3_desc">ストレスとの向き合い方や、心の健康を保つためのセルフケアを学びます。</p>
            </div>
            <!-- Card 4 -->
            <div class="habit-card">
              <div class="habit-card__badge">脳</div>
              <h5 class="habit-card__title" data-i18n="modal.field1.card4_title">認知症予防</h5>
              <p class="habit-card__desc" data-i18n="modal.field1.card4_desc">脳を使う習慣や、認知機能を保つための対策をわかりやすく学びます。</p>
            </div>
          </div>
        </div>

        <!-- Bottom Section: Close Button -->
        <div class="modal__footer">
          <button type="button" class="btn-modal-close js-modal-close" data-i18n="common.close">閉じる</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ============================================================
       SUPERVISION / FIELD 2 '測' MODAL
       ============================================================ -->
  <div id="modal-field-2" class="modal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal__overlay js-modal-close"></div>
    <div class="modal__container">
      <!-- Close Button Top Right -->
      <button type="button" class="modal__close-btn js-modal-close" aria-label="閉じる">
        <svg viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="16" cy="16" r="14" />
          <path d="M11 11l10 10M21 11L11 21" />
        </svg>
      </button>

      <div class="modal__content">
        <!-- Watermark Kanji "測" -->
        <div class="modal__watermark" aria-hidden="true">測</div>

        <!-- Top Section: Title, Intro & Image -->
        <div class="modal__top">
          <div class="modal__intro">
            <h3 class="modal__title" data-i18n="modal.field2.title">15種類の最新機器で<br>健康セルフチェック</h3>
            <div class="modal__text">
              <p data-i18n="modal.field2.p1">測定には、基本となる8つの測定（セルフ）とスタッフや<br>
                看護師資格者による7つの測定があります。<br>
                1つの測定が最大でも3〜5分程度の所要時間と<br>
                身体の負担も少なく、痛みを伴う測定はございません。<br>
                測定時にリラックスして受けて頂くためにも、<br>
                締め付けの少ない楽な服装でお受けください。<br>
                安心して測定してもらえるようにスタッフが寄り添い、<br>
                サポート致します。
              </p>
            </div>
          </div>
          <div class="modal__image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-02.jpg" alt="15種類の最新機器で健康セルフチェック" />
          </div>
        </div>

        <!-- Supervisor Box -->
        <div class="modal__supervisor-box">
          <div class="modal__supervisor-text">
            <p data-i18n="modal.field2.supervisor_text">【健康パビリオン】は<br>日本健康増進学術機構の<br>監修を受けて作られた健康施設です。<br>病気発見ではなく、自分の身体の状態を<br>知ってもらうことが第一の目的です。</p>
          </div>
          <div class="modal__supervisor-profile">
            <div class="modal__supervisor-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-03.jpg" alt="小野寺 敏">
            </div>
            <div class="modal__supervisor-info">
              <h5 class="modal__supervisor-name">小野寺 敏</h5>
              <p class="modal__supervisor-title" data-i18n="modal.field2.supervisor_title">日本健康増進学術機構 理事長<br>治未病平衡会研究所 所長<br>治未病総合病院 院長<br>医学博士 精神科医</p>
            </div>
          </div>
        </div>

        <!-- Bottom Section: 4 Cards and Intro Text -->
        <div class="modal__visible-section">
          <!-- 4 Cards Grid (Left column) -->
          <div class="modal__visible-grid">
            <!-- Card 1 -->
            <div class="habit-card">
              <div class="habit-card__badge">体</div>
              <h5 class="habit-card__title" data-i18n="modal.field2.card1_title">体成分分析</h5>
              <p class="habit-card__desc" data-i18n="modal.field2.card1_desc">筋肉、体脂肪、<br>水分バランスを測定</p>
            </div>
            <!-- Card 2 -->
            <div class="habit-card">
              <div class="habit-card__badge">血</div>
              <h5 class="habit-card__title" data-i18n="modal.field2.card2_title">血管年齢</h5>
              <p class="habit-card__desc" data-i18n="modal.field2.card2_desc">血管の硬さと<br>つまり具合を評価</p>
            </div>
            <!-- Card 3 -->
            <div class="habit-card">
              <div class="habit-card__badge">脳</div>
              <h5 class="habit-card__title" data-i18n="modal.field2.card3_title">脳年齢</h5>
              <p class="habit-card__desc" data-i18n="modal.field2.card3_desc">認知機能を<br>多角的にチェック</p>
            </div>
            <!-- Card 4 -->
            <div class="habit-card">
              <div class="habit-card__badge">骨</div>
              <h5 class="habit-card__title" data-i18n="modal.field2.card4_title">骨密度</h5>
              <p class="habit-card__desc" data-i18n="modal.field2.card4_desc">骨の強さを計測し<br>骨粗鬆症予防</p>
            </div>
          </div>

          <!-- Intro text (Right column) -->
          <div class="modal__visible-intro">
            <h4 class="modal__visible-title" data-i18n="modal.field2.visible_title">体成分分析、血管状態、脳年齢など<br>体の健康状態を<span class="text-gold">見える化</span></h4>
            <div class="modal__visible-text">
              <p data-i18n="modal.field2.visible_p1">健康状態を見える化することで自身の健康状態を把握し、改善すべきポイントが見えてきます。</p>
              <p class="text-gold" data-i18n="modal.field2.visible_p2">「何が良い」「どこが衰えているか」</p>
              <p data-i18n="modal.field2.visible_p3">ここでの結果を基に食事・運動と生活習慣を見直し、日々の生活改善へと繋げて頂きたいと思います。</p>
            </div>
          </div>
        </div>

        <!-- Bottom Section: Close Button -->
        <div class="modal__footer">
          <button type="button" class="btn-modal-close js-modal-close" data-i18n="common.close">閉じる</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ============================================================
       SUPERVISION / FIELD 3 '動' MODAL
       ============================================================ -->
  <div id="modal-field-3" class="modal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal__overlay js-modal-close"></div>
    <div class="modal__container">
      <!-- Close Button Top Right -->
      <button type="button" class="modal__close-btn js-modal-close" aria-label="閉じる">
        <svg viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="16" cy="16" r="14" />
          <path d="M11 11l10 10M21 11L11 21" />
        </svg>
      </button>

      <div class="modal__content">
        <!-- Watermark Kanji "動" -->
        <div class="modal__watermark" aria-hidden="true">動</div>

        <!-- Top Section: Title, Intro & Image -->
        <div class="modal__top">
          <div class="modal__intro">
            <h3 class="modal__title" data-i18n="modal.field3.title">自分の体力に合った<br>効果的な運動体験</h3>
            <div class="modal__text">
              <p data-i18n="modal.field3.p1">「健康トレーニング館」は、健康キャンパスで学んだ「運動」を実体験できる場所です。<br>日本健康増進学術機構監修の全天候型運動アトラクション施設です。</p>
              <p data-i18n="modal.field3.p2">17種類あるアトラクションで実際に身体を動かして、自身の体調、体力に合わせた「運動」が体験できます。</p>
              <p data-i18n="modal.field3.p3">身体を動かすことによって日頃のストレスや運動不足から解放されます。<br>また、自宅に戻ってから日常の健康習慣に取り入れやすくなるよう、目安となる運動時間や消費カロリーも一目で分かりやすく掲示しています。</p>
            </div>
          </div>
          <div class="modal__image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-04.jpg" alt="自分の体力に合った効果的な運動体験" />
          </div>
        </div>

        <!-- Bottom Section: Exercise Details, Image & Trainer Profile -->
        <div class="modal__exercise-section">
          <!-- Exercise Intro (Left Column) -->
          <div class="modal__exercise-intro">
            <h4 class="modal__exercise-title" data-i18n="modal.field3.exercise_title">各装置には<span class="text-gold">運動効果</span>と、<br class="u-pc">使用する<span class="text-gold">主な筋肉</span>を表示</h4>
            <h5 class="modal__exercise-subtitle" data-i18n="modal.field3.exercise_subtitle">ダイナモスピンの場合</h5>
            <div class="modal__exercise-text">
              <p data-i18n="modal.field3.exercise_text">運動のポイントや禁止事項、運動で使用する主な筋肉や、運動効果のレーダーチャートなどが日本語と英語で書かれたものが、機器ごとに全て提示されています。</p>
            </div>
          </div>

          <!-- Exercise Image (Center Column) -->
          <div class="modal__exercise-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-05.jpg" alt="各装置には運動効果と使用する主な筋肉を表示" />
          </div>

          <!-- Trainer Box (Right Column) -->
          <div class="modal__trainer-box">
            <div class="modal__trainer-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-06.jpg" alt="栴 ちかこ" />
            </div>
            <div class="modal__trainer-info">
              <h5 class="modal__trainer-name">栴 ちかこ</h5>
              <p class="modal__trainer-title" data-i18n="modal.field3.trainer_title">日本健康増進学術機構 会員<br>慶星体育大学 講師<br>（スポーツ人文・応用社会学系）<br>体育スポーツ学 博士<br>健康運動指導士</p>
            </div>
          </div>
        </div>

        <!-- Bottom Section: Close Button -->
        <div class="modal__footer">
          <button type="button" class="btn-modal-close js-modal-close" data-i18n="common.close">閉じる</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ============================================================
       SUPERVISION / FIELD 5 '癒' MODAL
       ============================================================ -->
  <div id="modal-field-5" class="modal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal__overlay js-modal-close"></div>
    <div class="modal__container">
      <!-- Close Button Top Right -->
      <button type="button" class="modal__close-btn js-modal-close" aria-label="閉じる">
        <svg viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="16" cy="16" r="14" />
          <path d="M11 11l10 10M21 11L11 21" />
        </svg>
      </button>

      <div class="modal__content">
        <!-- Watermark Kanji "癒" -->
        <div class="modal__watermark" aria-hidden="true">癒</div>

        <!-- Top Section: Title -->
        <h3 class="modal__title" style="margin-bottom: 32px;" data-i18n="modal.field5.title">広大な景色が生む解放感と<br>大自然に包まれて心身を癒す温浴</h3>

        <!-- Grid of 3 Healing Cards -->
        <div class="modal__healing-grid">
          <!-- Card 1 -->
          <div class="healing-card">
            <h4 class="healing-card__title" data-i18n="modal.field5.card1_title">阿蘇健康火山温泉</h4>
            <p class="healing-card__desc" data-i18n="modal.field5.card1_desc">天然のトリプルミネラルを含む硫酸塩温泉です。<br>大自然石庭露天風呂で、日頃の疲れを癒し、疲労回復やストレス解放を促します。</p>
            <div class="modal__healing-images">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-07.jpg" alt="阿蘇健康火山温泉 露天風呂" class="modal__healing-img-1" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-08.jpg" alt="阿蘇健康火山温泉 内湯" class="modal__healing-img-2" />
            </div>
          </div>

          <!-- Card 2 -->
          <div class="healing-card">
            <h4 class="healing-card__title" data-i18n="modal.field5.card2_title">健康温熱窯十三種</h4>
            <p class="healing-card__desc" data-i18n="modal.field5.card2_desc">薬草や鉱石の効能を体感できる13種類のドーム窯を備えた、日本最大級の健康温浴施設です。<br>癒しの温熱空間の中で安らぎと心身をリラックスし整えるひとときがお過ごしいただけます。</p>
            <div class="modal__healing-images">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-09.jpg" alt="健康温熱窯十三種 ドーム通路" class="modal__healing-img-1 modal__healing-img--tr" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-10.jpg" alt="健康温熱窯十三種 ドーム内" class="modal__healing-img-2 modal__healing-img--bl" />
            </div>
          </div>

          <!-- Card 3 -->
          <div class="healing-card">
            <h4 class="healing-card__title" data-i18n="modal.field5.card3_title">ふれあい動物王国</h4>
            <span class="healing-card__subtitle" data-i18n="modal.field5.card3_subtitle">アニマルセラピー施設</span>
            <p class="healing-card__desc" data-i18n="modal.field5.card3_desc">ここ大自然阿蘇の麓で、のびのびと暮らしている動物たちとふれあうことで、自然の雄大さ、命の大切さに触れ、心も落ち着き身体全体がリラックスできるアニマルセラピー施設です。<br>心が癒され不思議と元気が出てくる、そんなひと時を過ごすことができます。</p>
            <div class="modal__healing-images">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-11.jpg" alt="ふれあい動物王国 カピバラ" class="modal__healing-img-1" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-12.jpg" alt="ふれあい動物王国 フラミンゴ" class="modal__healing-img-2" />
            </div>
          </div>
        </div>

        <!-- Bottom Section: Close Button -->
        <div class="modal__footer">
          <button type="button" class="btn-modal-close js-modal-close" data-i18n="common.close">閉じる</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ============================================================
       SUPERVISION / FIELD 4 '食' MODAL
       ============================================================ -->
  <div id="modal-field-4" class="modal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal__overlay js-modal-close"></div>
    <div class="modal__container">
      <!-- Close Button Top Right -->
      <button type="button" class="modal__close-btn js-modal-close" aria-label="閉じる">
        <svg viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="16" cy="16" r="14" />
          <path d="M11 11l10 10M21 11L11 21" />
        </svg>
      </button>

      <div class="modal__content">
        <!-- Watermark Kanji "食" -->
        <div class="modal__watermark" aria-hidden="true">食</div>

        <!-- Top Section: Title -->
        <h3 class="modal__title" style="margin-bottom: 32px;" data-i18n="modal.field4.title">からだを想う、阿蘇の健康食</h3>

        <!-- Grid of 2 Food Cards -->
        <div class="modal__food-grid">
          <!-- Card 1 -->
          <div class="healing-card">
            <span class="food-card__badge" data-i18n="modal.field4.card1_badge">薬効成分を豊富に含む</span>
            <h4 class="food-card__title" data-i18n="modal.field4.card1_title">キノコの力を活かした「薬膳料理」</h4>
            <div class="modal__healing-images">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-13.jpg" alt="キノコの力を活かした薬膳料理 椎茸など" class="modal__healing-img-1" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-14.jpg" alt="キノコの力を活かした薬膳料理 鍋物" class="modal__healing-img-2" />
            </div>
          </div>

          <!-- Card 2 -->
          <div class="healing-card">
            <span class="food-card__badge" data-i18n="modal.field4.card2_badge">無農薬による自社栽培野菜を使用</span>
            <h4 class="food-card__title" data-i18n="modal.field4.card2_title">学術機構の管理栄養士が考えた<br>健康メニュー</h4>
            <div class="modal__healing-images">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-15.jpg" alt="学術機構の管理栄養士が考えた健康メニュー 和食" class="modal__healing-img-1" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-16.jpg" alt="学術機構の管理栄養士が考えた健康メニュー バイキング" class="modal__healing-img-2" />
            </div>
          </div>
        </div>

        <!-- Supervisor Box -->
        <div class="modal__supervisor-box">
          <div class="modal__supervisor-text">
            <h4 style="font-family: var(--font-serif); font-size: 20px; font-weight: 700; color: #fff; margin-bottom: 16px;" data-i18n="modal.field4.supervisor_heading">“生きる事は食べる事”</h4>
            <p data-i18n="modal.field4.supervisor_p1">大阪大学・医学部附属病院にて勤務後、<br>約60年 臨床と治療食、教育に携わる。</p>
            <p data-i18n="modal.field4.supervisor_p2">「病気を未然に防ぎ、強い身体と心の健康づくり」をコンセプトに<br>免疫力をアップする重要性を探求している。</p>
          </div>
          <div class="modal__supervisor-profile">
            <div class="modal__supervisor-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-17.jpg" alt="敏熊代 千鶴恵" />
            </div>
            <div class="modal__supervisor-info">
              <h5 class="modal__supervisor-name">敏熊代 千鶴恵</h5>
              <p class="modal__supervisor-title" data-i18n="modal.field4.supervisor_title">日本健康増進学術機構 会員<br>臨床管理栄養士<br>大阪健康女子大学卒業</p>
            </div>
          </div>
        </div>

        <!-- Bottom Section: Close Button -->
        <div class="modal__footer">
          <button type="button" class="btn-modal-close js-modal-close" data-i18n="common.close">閉じる</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ============================================================
       SUPERVISION / FIELD 6 '宿' MODAL
       ============================================================ -->
  <div id="modal-field-6" class="modal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal__overlay js-modal-close"></div>
    <div class="modal__container">
      <!-- Close Button Top Right -->
      <button type="button" class="modal__close-btn js-modal-close" aria-label="閉じる">
        <svg viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="16" cy="16" r="14" />
          <path d="M11 11l10 10M21 11L11 21" />
        </svg>
      </button>

      <div class="modal__content">
        <!-- Watermark Kanji "宿" -->
        <div class="modal__watermark" aria-hidden="true">宿</div>

        <!-- Top Section: Title, Subtitle, Text, and Profile -->
        <h3 class="modal__title" style="margin-bottom: 24px;" data-i18n="modal.field6.title">体験胎内空間が<br>安らぎと心地よさを誘い良質な睡眠へ</h3>

        <div class="modal__lodging-top">
          <div class="modal__lodging-intro">
            <h4 class="modal__lodging-subtitle" data-i18n="modal.field6.subtitle">森の中の宿泊施設で<span class="text-gold">森林セラピー効果</span>を実感</h4>
            <div class="modal__lodging-text">
              <p data-i18n="modal.field6.p1">森林には、人の心と身体をやさしく整える力があるとされています。</p>
              <p data-i18n="modal.field6.p2">木々の緑を眺めること。森の香りを深く吸い込むこと。<br>木肌に触れ、小鳥のさえずりや小川のせせらぎに耳を澄ませること。</p>
              <p data-i18n="modal.field6.p3">五感を通して自然を感じる時間が、日常の緊張をほどき、<br>心身をリラックスした状態へと導きます。</p>
              <p data-i18n="modal.field6.p4">森林由来の香りや自然環境による刺激は、生理的なリラックスを促し、<br>免疫機能の維持・向上にもつながると考えられています。</p>
              <p data-i18n="modal.field6.p5">自然の中で深く休むことは、<br>病気を未然に防ぐ「予防医学」の視点からも注目されています。</p>
            </div>
          </div>

          <!-- Profile Box (清水 邦義) -->
          <div class="modal__lodging-profile-box">
            <div class="modal__lodging-profile-info">
              <h5 class="modal__lodging-profile-name">清水 邦義</h5>
              <p class="modal__lodging-profile-title" data-i18n="modal.field6.profile_title">日本健康増進学術機構 理事<br>九州大学 農学研究院<br>森林圏環境資源科学<br>准教授 農学博士</p>
            </div>
            <div class="modal__lodging-profile-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-18.jpg" alt="清水 邦義" />
            </div>
          </div>
        </div>

        <!-- Bottom Section: Dome Detail Card -->
        <div class="lodging-detail-card">
          <!-- Image (Left column on PC) -->
          <div class="lodging-detail-card__image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-img-19.jpg" alt="プライベート・ロイヤルゾーン ドーム型客室" />
          </div>

          <!-- Text details (Right column on PC) -->
          <div class="lodging-detail-card__info">
            <p class="lodging-detail-card__tag" data-i18n="modal.field6.detail_tag">大自然阿蘇健康の森</p>
            <h4 class="lodging-detail-card__title" data-i18n="modal.field6.detail_title">プライベート・ロイヤルゾーン</h4>
            <div class="lodging-detail-card__desc">
              <p data-i18n="modal.field6.detail_p1">全室門扉とガーデンを設えた客室は、全74室。<br>ゆったりと配置された「離れ」タイプの客室はフロントからも近く、歩行に配慮したワンランク上の休息を過ごすことができます。</p>
              <p style="margin-top: 16px;" data-i18n="modal.field6.detail_p2">白を基調とした丸いドーム型の客室は、どこか異国の地に足を踏み入れた感覚を覚えます。<br>大自然が生み出す恵みの中で、非日常を体感できます。</p>
            </div>
          </div>
        </div>

        <!-- Bottom Section: Close Button -->
        <div class="modal__footer">
          <button type="button" class="btn-modal-close js-modal-close" data-i18n="common.close">閉じる</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ============================================================
       CONTACT FORM (お問い合わせ・ご相談) MODAL
       ============================================================ -->
  <div id="modal-contact" class="modal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal__overlay js-modal-close"></div>
    <div class="modal__container modal__container--contact">
      <!-- Close Button Top Right -->
      <button type="button" class="modal__close-btn js-modal-close" aria-label="閉じる" data-i18n-aria-label="common.close">
        <svg viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="16" cy="16" r="14" />
          <path d="M11 11l10 10M21 11L11 21" />
        </svg>
      </button>

      <div class="modal__content contact-modal" data-contact-flow>

        <!-- ===== STEP 1: 入力 (input) ===== -->
        <div class="contact-step is-active" data-step="input">
          <form class="contact-modal__form js-contact-form">

            <!-- Name field -->
            <div class="contact-modal__field">
              <label class="contact-modal__label" data-i18n="contact.name_label">お名前 <span class="text-danger">*</span></label>
              <input type="text" name="ludoa_name" class="contact-modal__input" placeholder="阿蘇 太郎" data-i18n-placeholder="contact.name_placeholder" required />
            </div>

            <!-- Email & Phone row -->
            <div class="contact-modal__row">
              <div class="contact-modal__field contact-modal__field--half">
                <label class="contact-modal__label" data-i18n="contact.email_label">メールアドレス <span class="text-danger">*</span></label>
                <input type="email" name="ludoa_email" class="contact-modal__input" placeholder="example@domain.com" required />
              </div>
              <div class="contact-modal__field contact-modal__field--half">
                <label class="contact-modal__label" data-i18n="contact.tel_label">お電話番号 <span class="text-danger">*</span></label>
                <input type="tel" name="ludoa_tel" class="contact-modal__input" placeholder="090-0000-0000" required />
              </div>
            </div>

            <!-- Select field -->
            <div class="contact-modal__field">
              <label class="contact-modal__label" data-i18n="contact.subject_label">お問い合わせ内容の種類 <span class="text-danger">*</span></label>
              <div class="contact-modal__select-wrapper">
                <select name="ludoa_subject_type" class="contact-modal__select" required>
                  <option value="" disabled selected hidden data-i18n="contact.subject_opt1">5泊6日プランの仮予約</option>
                  <option value="5泊6日プランの仮予約" data-i18n="contact.subject_opt1">5泊6日プランの仮予約</option>
                  <option value="ご相談・その他" data-i18n="contact.subject_opt2">ご相談・その他のお問い合わせ</option>
                </select>
              </div>
            </div>

            <!-- Textarea field -->
            <div class="contact-modal__field">
              <label class="contact-modal__label" data-i18n="contact.message_label">ご質問・ご要望</label>
              <textarea name="ludoa_message" class="contact-modal__textarea" placeholder="食事制限やアレルギー、送迎に関するご相談などはこちらにご記入ください。" data-i18n-placeholder="contact.message_placeholder" rows="5"></textarea>
            </div>

            <!-- Policy agreement text -->
            <p class="contact-modal__policy-text" data-i18n="contact.policy_text">
              ご入力いただきました情報は、当社の個人情報保護方針に基づき厳重に管理いたします。<br />
              当社の<a href="#" class="js-privacy-trigger contact-modal__policy-link">個人情報保護方針</a>をご確認いただき、同意いただいた上で送信ください。
            </p>

            <!-- Checkbox agree -->
            <div class="contact-modal__checkbox-container">
              <label class="contact-modal__checkbox-label">
                <input type="checkbox" name="ludoa_agree" class="contact-modal__checkbox" required />
                <span class="contact-modal__checkbox-text" data-i18n="contact.agree">同意する<span class="text-danger">*</span></span>
              </label>
            </div>

            <!-- Submit Button -->
            <div class="contact-modal__submit-container">
              <button type="submit" class="contact-modal__submit-btn" data-i18n="contact.submit">送信する</button>
            </div>

          </form>
        </div>

        <!-- ===== STEP 2: 確認 (confirm) ===== -->
        <div class="contact-step" data-step="confirm">
          <h3 class="contact-modal__step-title">お問い合わせ内容のご確認</h3>
          <p class="contact-modal__step-lead">以下の内容でお間違いがないかご確認ください。</p>

          <dl class="contact-confirm">
            <div class="contact-confirm__row">
              <dt class="contact-confirm__label">お名前</dt>
              <dd class="contact-confirm__value" data-confirm="name"></dd>
            </div>
            <div class="contact-confirm__row">
              <dt class="contact-confirm__label">メールアドレス</dt>
              <dd class="contact-confirm__value" data-confirm="email"></dd>
            </div>
            <div class="contact-confirm__row">
              <dt class="contact-confirm__label">お電話番号</dt>
              <dd class="contact-confirm__value" data-confirm="tel"></dd>
            </div>
            <div class="contact-confirm__row">
              <dt class="contact-confirm__label">お問い合わせ内容の種類</dt>
              <dd class="contact-confirm__value" data-confirm="subject_type"></dd>
            </div>
            <div class="contact-confirm__row">
              <dt class="contact-confirm__label">ご質問・ご要望</dt>
              <dd class="contact-confirm__value" data-confirm="message"></dd>
            </div>
          </dl>

          <p class="contact-modal__error js-contact-error" role="alert" hidden></p>

          <div class="contact-modal__actions">
            <button type="button" class="contact-modal__btn contact-modal__btn--back js-contact-back">戻る</button>
            <button type="button" class="contact-modal__btn contact-modal__btn--send js-contact-send">送信する</button>
          </div>
        </div>

        <!-- ===== STEP 3: 完了 (thankyou) ===== -->
        <div class="contact-step" data-step="thankyou">
          <div class="contact-thanks">
            <div class="contact-thanks__icon" aria-hidden="true">
              <svg viewBox="0 0 64 64" width="56" height="56" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="32" cy="32" r="29" />
                <path d="M20 33l8 8 16-18" />
              </svg>
            </div>
            <h3 class="contact-modal__step-title">お問い合わせありがとうございます</h3>
            <p class="contact-thanks__text">
              お問い合わせを受け付けました。<br />
              内容を確認のうえ、担当者より追ってご連絡いたします。
            </p>
            <div class="contact-modal__actions contact-modal__actions--center">
              <button type="button" class="contact-modal__btn contact-modal__btn--send js-modal-close">閉じる</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- ============================================================
       PRIVACY POLICY (個人情報保護方針) MODAL
       ============================================================ -->
  <div id="modal-privacy" class="modal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal__overlay js-modal-close"></div>
    <div class="modal__container modal__container--privacy">
      <!-- Close Button Top Right -->
      <button type="button" class="modal__close-btn js-modal-close" aria-label="閉じる">
        <svg viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="16" cy="16" r="14" />
          <path d="M11 11l10 10M21 11L11 21" />
        </svg>
      </button>

      <div class="modal__content privacy-modal">
        <!-- Title -->
        <h3 class="privacy-modal__title" data-i18n="modal.privacy.title">- 個人情報保護方針 -</h3>

        <!-- Intro -->
        <p class="privacy-modal__intro" data-i18n="modal.privacy.intro">
          株式会社阿蘇ファームランド（以下、当社）は、個人情報を保護することが社会的責務であるとともに、社会の信頼を得て企業活動を推進するために不可欠な要件であると認識しております。当社は、お客様の個人情報の適切な管理・利用に十分配慮し、次の取り組みを実施します。
        </p>

        <!-- List of items -->
        <div class="privacy-modal__list">
          
          <!-- Item 1 -->
          <div class="privacy-modal__item">
            <h4 class="privacy-modal__item-title" data-i18n="modal.privacy.item1_title">
              <span class="privacy-modal__item-icon"></span>
              個人情報の管理
            </h4>
            <p class="privacy-modal__item-text" data-i18n="modal.privacy.item1_text">
              当社は、お客様の個人情報の適切な管理・利用に十分配慮し、次の取り組みを実施します。
            </p>
          </div>

          <!-- Item 2 -->
          <div class="privacy-modal__item">
            <h4 class="privacy-modal__item-title" data-i18n="modal.privacy.item2_title">
              <span class="privacy-modal__item-icon"></span>
              利用目的と収集範囲
            </h4>
            <p class="privacy-modal__item-text" data-i18n="modal.privacy.item2_text">
              当社は、お客様からお名前・ご住所・電話番号・メールアドレスなどの個人情報をご提供いただく場合は、あらかじめ利用目的やお問い合せの窓口などをお知らせし、適切な範囲内でお客様の個人情報を収集させていただきます。
            </p>
          </div>

          <!-- Item 3 -->
          <div class="privacy-modal__item">
            <h4 class="privacy-modal__item-title" data-i18n="modal.privacy.item3_title">
              <span class="privacy-modal__item-icon"></span>
              個人情報の利用
            </h4>
            <p class="privacy-modal__item-text" data-i18n="modal.privacy.item3_text">
              お客様から、個人情報を収集させていただく場合は、その目的を明確にお知らせするものとし、次にあげる目的のために利用させていただきます。<br />
              お客様からのお問合せへの回答のため。<br />
              ・商品のご注文の受付やそれに伴うご連絡のため。<br />
              ・商品の配達やそれに伴うご連絡のため。<br />
              ・保守サービスのご提供のため。<br />
              ・商品やサービスをご案内するダイレクトメールや電子メールを送付するため。<br />
              ・当社グループのマーケティング及びサービス向上、商品開発のための統計調査のため。<br />
              ・各種キャンペーン等のお知らせをお客様にお届けするため。<br />
              ・ポイントカードなど会員サービスへの登録の為。
            </p>
          </div>

          <!-- Item 4 -->
          <div class="privacy-modal__item">
            <h4 class="privacy-modal__item-title" data-i18n="modal.privacy.item4_title">
              <span class="privacy-modal__item-icon"></span>
              第三者への提供・開示の禁止
            </h4>
            <p class="privacy-modal__item-text" data-i18n="modal.privacy.item4_text">
              当社は、お客様から同意いただいている場合や法令に基づき開示を請求された場合など正当な理由がある場合を除き、お客様の個人情報を第三者に提供・開示いたしません。
            </p>
          </div>

          <!-- Item 5 -->
          <div class="privacy-modal__item">
            <h4 class="privacy-modal__item-title" data-i18n="modal.privacy.item5_title">
              <span class="privacy-modal__item-icon"></span>
              業務委託先の監督
            </h4>
            <p class="privacy-modal__item-text" data-i18n="modal.privacy.item5_text">
              当社は、お客様から同意いただいた利用目的を達成するために、当社より業務委託先に対してお客様の個人情報を開示する場合には、当社と同様の水準で個人情報の厳重な管理を徹底するよう契約により義務付け、これを実施させるなど、適切な監督を行います。
            </p>
          </div>

          <!-- Item 6 -->
          <div class="privacy-modal__item">
            <h4 class="privacy-modal__item-title" data-i18n="modal.privacy.item6_title">
              <span class="privacy-modal__item-icon"></span>
              情報セキュリティの確保・向上
            </h4>
            <p class="privacy-modal__item-text" data-i18n="modal.privacy.item6_text">
              当社は、お客様の個人情報の漏洩・紛失・改ざんなどを防止するため、継続して情報セキュリティの確保・向上に努めます。
            </p>
          </div>

          <!-- Item 7 -->
          <div class="privacy-modal__item">
            <h4 class="privacy-modal__item-title" data-i18n="modal.privacy.item7_title">
              <span class="privacy-modal__item-icon"></span>
              教育・啓発
            </h4>
            <p class="privacy-modal__item-text" data-i18n="modal.privacy.item7_text">
              当社は、すべての役員及び従業員に対し、個人情報保護の重要性を理解し、お客様の個人情報を適切に取り扱うよう教育・啓発を行います。
            </p>
          </div>

          <!-- Item 8 -->
          <div class="privacy-modal__item">
            <h4 class="privacy-modal__item-title" data-i18n="modal.privacy.item8_title">
              <span class="privacy-modal__item-icon"></span>
              個人情報の開示・訂正などへの対応
            </h4>
            <p class="privacy-modal__item-text" data-i18n="modal.privacy.item8_text">
              当社は、お客様より収集させて頂いた個人情報を次のいずれかに該当する場合を除き、第三者に提供・開示等は一切致しません。<br />
              ・法令等により開示が求められた場合。<br />
              ・お客様からのお問合せに対し、その内容が当社の協力会社から直接回答するのが適当と当社が判断した場合。<br />
              ・適切な保護処置を講じた上で、当社の協力会社に提供・共同利用する場合。<br />
              ・お客様の事前の同意を得た場合。<br />
              ・お客様及び一般市民の生命、健康、財産等に重大な損害が発生する事を防止する為に必要な場合。<br />
              ・公的機関より法律に基づく権限による開示請求があった場合。<br />
              弊社は、お客様がご自身の個人情報の開示や訂正などをご希望される場合、お申し出いただいたお客様がご本人であることを確認させていただいた上で、合理的な期間及び範囲で対応させていただきます。
            </p>
          </div>

          <!-- Item 9 -->
          <div class="privacy-modal__item">
            <h4 class="privacy-modal__item-title" data-i18n="modal.privacy.item9_title">
              <span class="privacy-modal__item-icon"></span>
              継続的な見直しと改善
            </h4>
            <p class="privacy-modal__item-text" data-i18n="modal.privacy.item9_text">
              当社は、個人情報保護に関連する法令、その他の規範を遵守するとともに、社会環境の変化に応じて、個人情報保護の取り組みを継続的に見直し、改善します。
            </p>
          </div>

        </div>

        <!-- Bottom Section: Close Button -->
        <div class="modal__footer">
          <button type="button" class="btn-modal-close js-modal-close" data-i18n="common.close">閉じる</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ============================================================
       HEALTH PROGRAM SCHEDULE DETAIL MODAL
       ============================================================ -->
  <div id="modal-schedule-detail" class="modal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal__overlay js-modal-close"></div>
    <div class="modal__container modal__container--schedule-detail">
      <!-- Close Button Top Right -->
      <button type="button" class="modal__close-btn js-modal-close" aria-label="閉じる">
        <svg viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="16" cy="16" r="14" />
          <path d="M11 11l10 10M21 11L11 21" />
        </svg>
      </button>

      <div class="modal__content schedule-modal">
        <!-- Title & Subtitle -->
        <h3 class="schedule-modal__title">健康プログラム <span>(5泊6日)</span><br />詳細スケジュール</h3>
        <p class="schedule-modal__note">※画面を拡大してご確認ください</p>

        <!-- Day Rows Wrapper -->
        <div class="schedule-modal__rows">

          <!-- DAY 1 -->
          <div class="schedule-modal__day-row">
            <div class="schedule-modal__day-badge">
              <span class="schedule-modal__day-label">DAY</span>
              <span class="schedule-modal__day-number">1</span>
            </div>
            <div class="schedule-modal__cards-wrapper">
              <!-- Card 01 -->
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">01</span>
                <h4 class="schedule-modal__card-title">チェックイン</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-01.svg" alt="チェックイン" />
                </div>
              </div>
              <!-- Card 02 -->
              <div class="schedule-modal__card schedule-modal__card--gold">
                <span class="schedule-modal__card-num">02</span>
                <h4 class="schedule-modal__card-title">健康パビリオン<br />(測定)</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-02.svg" alt="健康パビリオン(測定)" />
                </div>
              </div>
              <!-- Card 03 -->
              <div class="schedule-modal__card schedule-modal__card--gold">
                <span class="schedule-modal__card-num">03</span>
                <h4 class="schedule-modal__card-title">体力年齢測定</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-03.svg" alt="体力年齢測定" />
                </div>
              </div>
              <!-- Card 04 -->
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">04</span>
                <h4 class="schedule-modal__card-title">温泉</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-04.svg" alt="温泉" />
                </div>
              </div>
              <!-- Card 05 -->
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">05</span>
                <h4 class="schedule-modal__card-title">夕食</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-05.svg" alt="夕食" />
                </div>
              </div>
              <!-- Card 06 -->
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">06</span>
                <h4 class="schedule-modal__card-title">睡眠</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-06.svg" alt="睡眠" />
                </div>
              </div>
            </div>
          </div>

          <!-- DAY 2 -->
          <div class="schedule-modal__day-row">
            <div class="schedule-modal__day-badge">
              <span class="schedule-modal__day-label">DAY</span>
              <span class="schedule-modal__day-number">2</span>
            </div>
            <div class="schedule-modal__cards-wrapper">
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">01</span>
                <h4 class="schedule-modal__card-title">朝食</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-07.svg" alt="朝食" />
                </div>
              </div>
              <div class="schedule-modal__card schedule-modal__card--gold">
                <span class="schedule-modal__card-num">02</span>
                <h4 class="schedule-modal__card-title">健康<br />キャンパス</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-08.svg" alt="健康キャンパス" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">03</span>
                <h4 class="schedule-modal__card-title">フリータイム<br />(散歩など)</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-09.svg" alt="フリータイム" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">04</span>
                <h4 class="schedule-modal__card-title">昼食<br />バイキング</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-10.svg" alt="昼食バイキング" />
                </div>
              </div>
              <div class="schedule-modal__card schedule-modal__card--gold">
                <span class="schedule-modal__card-num">05</span>
                <h4 class="schedule-modal__card-title">ヨガ</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-11.svg" alt="ヨガ" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">06</span>
                <h4 class="schedule-modal__card-title">温泉</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-12.svg" alt="温泉" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">07</span>
                <h4 class="schedule-modal__card-title">夕食</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-13.svg" alt="夕食" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">08</span>
                <h4 class="schedule-modal__card-title">睡眠</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-14.svg" alt="睡眠" />
                </div>
              </div>
            </div>
          </div>

          <!-- DAY 3 -->
          <div class="schedule-modal__day-row">
            <div class="schedule-modal__day-badge">
              <span class="schedule-modal__day-label">DAY</span>
              <span class="schedule-modal__day-number">3</span>
            </div>
            <div class="schedule-modal__cards-wrapper">
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">01</span>
                <h4 class="schedule-modal__card-title">朝食</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-15.svg" alt="朝食" />
                </div>
              </div>
              <div class="schedule-modal__card schedule-modal__card--gold">
                <span class="schedule-modal__card-num">02</span>
                <h4 class="schedule-modal__card-title">健康<br />トレーニング館</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-16.svg" alt="健康トレーニング館" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">03</span>
                <h4 class="schedule-modal__card-title">昼食<br />バイキング</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-17.svg" alt="昼食バイキング" />
                </div>
              </div>
              <div class="schedule-modal__card schedule-modal__card--gold">
                <span class="schedule-modal__card-num">04</span>
                <h4 class="schedule-modal__card-title">温熱棟<br />13種</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-18.svg" alt="温熱棟13種" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">05</span>
                <h4 class="schedule-modal__card-title">フリータイム</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-19.svg" alt="フリータイム" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">06</span>
                <h4 class="schedule-modal__card-title">夕食</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-20.svg" alt="夕食" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">07</span>
                <h4 class="schedule-modal__card-title">睡眠</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-21.svg" alt="睡眠" />
                </div>
              </div>
            </div>
          </div>

          <!-- DAY 4 -->
          <div class="schedule-modal__day-row">
            <div class="schedule-modal__day-badge">
              <span class="schedule-modal__day-label">DAY</span>
              <span class="schedule-modal__day-number">4</span>
            </div>
            <div class="schedule-modal__cards-wrapper">
              <!-- Regular Card 01 -->
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">01</span>
                <h4 class="schedule-modal__card-title">朝食</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-22.svg" alt="朝食" />
                </div>
              </div>
              <!-- Giant Wide Card 02 -->
              <div class="schedule-modal__card schedule-modal__card--wide">
                <span class="schedule-modal__card-num">02</span>
                <h4 class="schedule-modal__card-title">1日観光</h4>
                <div class="schedule-modal__wide-content">
                  <!-- Spot 1 -->
                  <div class="schedule-modal__wide-spot">
                    <span class="schedule-modal__spot-name">・大観峰</span>
                    <div class="schedule-modal__spot-img">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-23.svg" alt="大観峰" />
                    </div>
                  </div>
                  <!-- Spot 2 -->
                  <div class="schedule-modal__wide-spot">
                    <span class="schedule-modal__spot-name">・白川水源</span>
                    <div class="schedule-modal__spot-img">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-24.svg" alt="白川水源" />
                    </div>
                  </div>
                  <!-- Spot 3 -->
                  <div class="schedule-modal__wide-spot">
                    <span class="schedule-modal__spot-name">・明神池名水公園</span>
                    <div class="schedule-modal__spot-img">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-25.svg" alt="明神池名水公園" />
                    </div>
                  </div>
                  <!-- Spot 4 -->
                  <div class="schedule-modal__wide-spot">
                    <span class="schedule-modal__spot-name">・菊池渓谷</span>
                    <div class="schedule-modal__spot-img">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-26.svg" alt="菊池渓谷" />
                    </div>
                  </div>
                </div>
              </div>
              <!-- Regular Card 03 -->
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">03</span>
                <h4 class="schedule-modal__card-title">温泉</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-27.svg" alt="温泉" />
                </div>
              </div>
              <!-- Regular Card 04 -->
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">04</span>
                <h4 class="schedule-modal__card-title">夕食</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-28.svg" alt="夕食" />
                </div>
              </div>
              <!-- Regular Card 05 -->
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">05</span>
                <h4 class="schedule-modal__card-title">睡眠</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-29.svg" alt="睡眠" />
                </div>
              </div>
            </div>
          </div>

          <!-- DAY 5 -->
          <div class="schedule-modal__day-row">
            <div class="schedule-modal__day-badge">
              <span class="schedule-modal__day-label">DAY</span>
              <span class="schedule-modal__day-number">5</span>
            </div>
            <div class="schedule-modal__cards-wrapper">
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">01</span>
                <h4 class="schedule-modal__card-title">夫婦早朝散歩</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-30.svg" alt="夫婦早朝散歩" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">02</span>
                <h4 class="schedule-modal__card-title">朝食</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-31.svg" alt="朝食" />
                </div>
              </div>
              <div class="schedule-modal__card schedule-modal__card--gold">
                <span class="schedule-modal__card-num">03</span>
                <h4 class="schedule-modal__card-title">ドーム還元浴</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-32.svg" alt="ドーム還元浴" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">04</span>
                <h4 class="schedule-modal__card-title">きのこ亭昼食</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-33.svg" alt="きのこ亭昼食" />
                </div>
              </div>
              <!-- Special Gold Bordered Card 05 -->
              <div class="schedule-modal__card schedule-modal__card--gold-bordered">
                <span class="schedule-modal__card-num">05</span>
                <h4 class="schedule-modal__card-title">現地観光</h4>
                <p class="schedule-modal__card-subtitle">上色見熊野<br />座神社</p>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-34.svg" alt="現地観光 上色見熊野座神社" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">06</span>
                <h4 class="schedule-modal__card-title">温泉</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-35.svg" alt="温泉" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">07</span>
                <h4 class="schedule-modal__card-title">夕食</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-36.svg" alt="夕食" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">08</span>
                <h4 class="schedule-modal__card-title">睡眠</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-37.svg" alt="睡眠" />
                </div>
              </div>
            </div>
          </div>

          <!-- DAY 6 -->
          <div class="schedule-modal__day-row">
            <div class="schedule-modal__day-badge">
              <span class="schedule-modal__day-label">DAY</span>
              <span class="schedule-modal__day-number">6</span>
            </div>
            <div class="schedule-modal__cards-wrapper">
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">01</span>
                <h4 class="schedule-modal__card-title">朝食</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-38.svg" alt="朝食" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">02</span>
                <h4 class="schedule-modal__card-title">チェックアウト</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-39.svg" alt="チェックアウト" />
                </div>
              </div>
              <div class="schedule-modal__card schedule-modal__card--gold">
                <span class="schedule-modal__card-num">03</span>
                <h4 class="schedule-modal__card-title">健康パビリオン<br />(最終測定)</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-40.svg" alt="健康パビリオン(最終測定)" />
                </div>
              </div>
              <div class="schedule-modal__card schedule-modal__card--gold">
                <span class="schedule-modal__card-num">04</span>
                <h4 class="schedule-modal__card-title">健康キャンパス<br />(滞在振り返り)</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-41.svg" alt="健康キャンパス(滞在振り返り)" />
                </div>
              </div>
              <div class="schedule-modal__card">
                <span class="schedule-modal__card-num">05</span>
                <h4 class="schedule-modal__card-title">フリータイム<br />・ご出発</h4>
                <div class="schedule-modal__card-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/modal-icon-42.svg" alt="フリータイム・ご出発" />
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Bottom Section: Close Button -->
        <div class="modal__footer">
          <button type="button" class="btn-modal-close js-modal-close" data-i18n="common.close">閉じる</button>
        </div>
      </div>
    </div>
  </div>


<?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * Template — one-page LP main content.
 *
 * @package Ludoa
 */

get_header();
?>
  <main id="top">
    <!-- ===================== FV / HERO ===================== -->
    <section id="hero" class="hero" aria-label="ファーストビュー">
      <div class="hero__container">
        <!-- 1. Tiêu đề -->
        <div class="hero__copy reveal-up">
          <h1 class="hero__title" data-i18n="hero.title">
            <span class="hero__title-top">世界最高水準<span class="hero__title-of">の</span></span>
            <span class="hero__title-main">総合予防医療施設</span>
          </h1>
          <p class="hero__tag" data-i18n="hero.tag">定年退職後の新しい健康習慣</p>
        </div>

        <!-- 2+3. Nhóm huy hiệu + ảnh (canh thẳng hàng, dễ kiểm soát) -->
        <div class="hero__visual">
          <ul class="hero__badges reveal-stagger">
            <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/badge-1.png" alt="自社生産による安全と機能性" width="262" height="117" /></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/badge-2.png" alt="日本健康増進学術機構による総合監修" width="280" height="140" /></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/badge-3.png" alt="厚労省認定施設 ヘルスツーリズム認証" width="273" height="113" /></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/badge-4.png" alt="阿蘇外輪山を一望 日本最大級 of 温泉" width="273" height="112" /></li>
          </ul>

          <div class="hero__media reveal-fade">
            <div class="hero__media-frame">
              <picture>
                <source media="(max-width: 1023px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/hero-resort-sp.jpg" />
                <img class="hero__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-resort.jpg" alt="大自然阿蘇 健康の森 全景" />
              </picture>
            </div>
            <a class="hero__reserve js-reserve" href="#">
              <span class="hero__reserve-tag" data-i18n="hero.reserve_tag">滞在型健康増進プログラム</span>
              <span class="hero__reserve-label" data-i18n="hero.reserve_label">今すぐ予約する<span class="hero__reserve-arrow" aria-hidden="true">›</span></span>
            </a>
          </div>
        </div>

        <!-- 4. SCROLL -->
        <div class="hero__scroll" aria-hidden="true">
          <span class="hero__scroll-line"></span>
          <span class="hero__scroll-text">SCROLL</span>
        </div>
      </div>
    </section>
    <!-- Phase 4 -->
    <!-- ===================== PROGRAM ===================== -->
    <section id="program" class="program">
      <img class="program__deco reveal-deco" src="<?php echo get_template_directory_uri(); ?>/assets/img/deco-program.svg" alt="" aria-hidden="true" />

      <figure class="program__photo program__photo--1 reveal-left">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-01.jpg" alt="ご夫婦で参加する様子" />
      </figure>

      <div class="program__inner">
        <div class="program__body reveal-up">
          <div class="program__head">
            <h2 class="program__title" data-i18n="program.title">滞在型健康増進プログラムとは</h2>
            <span class="program__divider"></span>
          </div>
          <div class="program__text">
            <p data-i18n="program.p1">本プログラムは、<br class="u-sp" />60歳前後の定年退職される方を中心とした<br class="u-pc" />定年退職者向けの滞在型健康増進プログラムです。</p>
            <p data-i18n="program.p2">人生の転換期において「健康を再定義し、習慣化する」ことを目的とし、<br class="u-pc" />科学的根拠（エビデンス）に基づいた実践型の学びと体験を提供します。</p>
            <p data-i18n="program.p3">単なる健康施設ではなく、悔いのないセカンドステージを実現するための<br class="u-pc" />「健康の登竜門」として、ご夫婦一緒に参加しながら、<br />これからの人生を自立して歩むための土台を築きます。</p>
            <p data-i18n="program.p4">大切な家族のためにも、いつまでも元気で過ごすために。<br class="u-pc" />そして、豊かな老後のために、健康寿命を延ばすことを目指します。</p>
          </div>
        </div>
      </div>

      <figure class="program__photo program__photo--2 reveal-right">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-02.jpg" alt="温浴・リラクゼーション体験" />
      </figure>
      <figure class="program__photo program__photo--3 reveal-right">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-03.jpg" alt="施設全景" />
      </figure>
    </section>
    <!-- ===================== SUPERVISION ===================== -->
    <section id="supervision" class="supervision">

      <div class="supervision__inner">
        <!-- Huy hiệu PC: Hiển thị trên tiêu đề ở PC -->
        <ul class="supervision__badges supervision__badges--pc u-pc" aria-hidden="true">
          <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/badge-1.png" alt="スマートミール認証" width="260" height="130" /></li>
          <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/badge-3.png" alt="厚生労働省認定施設 ヘルスツーリズム認証" width="260" height="130" /></li>
          <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/badge-2.png" alt="医師/博士/管理栄養士等 120名の専門家監修" width="280" height="140" /></li>
        </ul>

        <!-- Cụm Tiêu đề chính -->
        <div class="supervision__header reveal-up">
          <p class="supervision__subtitle" data-i18n="supervision.subtitle">一般社団法人</p>
          <h2 class="supervision__title" data-i18n="supervision.title">日本健康増進学術機構による総合監修</h2>
          <span class="supervision__divider"></span>
        </div>

        <!-- Huy hiệu SP: Hiển thị dưới tiêu đề ở SP -->
        <ul class="supervision__badges supervision__badges--sp u-sp" aria-hidden="true">
          <li class="badge-top"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/badge-3.png" alt="厚生労働省認定施設 ヘルスツーリズム認証" width="200" height="100" /></li>
          <li class="badge-left"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/badge-1.png" alt="自社生産による安全と機能性" width="160" height="80" /></li>
          <li class="badge-right"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/badge-4.png" alt="阿蘇外輪山を一望 日本最大級の温泉" width="160" height="80" /></li>
        </ul>

        <!-- Mô tả ngắn -->
        <div class="supervision__desc reveal-up">
          <p data-i18n="supervision.desc1">本滞在型健康増進プログラムでは、プログラム食・医療・予防・自然の力を融合し、<br class="u-pc" />専門家たちが辿り着いた唯一無二 of 健康体験を提供します。</p>
          <p data-i18n="supervision.desc2">あなたの未来の健康を本気で想う、その答えがここにあります。</p>
        </div>
      </div>

      <!-- Slider Chuyên gia / Bác sĩ -->
      <div class="supervision__slider-container reveal-fade">
          <div class="swiper supervision-swiper">
            <div class="swiper-wrapper">
              <!-- Slide 1: 福生 吉裕 -->
              <div class="swiper-slide">
                <div class="member-card">
                  <div class="member-card__bg"></div>
                  <div class="member-card__img-wrapper">
                    <img class="member-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/member-1.png" alt="福生 吉裕" />
                  </div>
                  <div class="member-card__info">
                    <span class="member-card__en">Fukuo Yoshihiro</span>
                    <h3 class="member-card__name">福生 吉裕</h3>
                    <p class="member-card__title" data-i18n="supervision.member1_title">
                      日本健康増進学術機構 理事<br />
                      (一財)博慈会 老人病研究所 所長<br />
                      医学博士
                    </p>
                  </div>
                </div>
              </div>

              <!-- Slide 2: 坂口 力 -->
              <div class="swiper-slide">
                <div class="member-card">
                  <div class="member-card__bg"></div>
                  <div class="member-card__img-wrapper">
                    <img class="member-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/member-2.png" alt="坂口 力" />
                  </div>
                  <div class="member-card__info">
                    <span class="member-card__en">Sakaguchi Riki</span>
                    <h3 class="member-card__name">坂口 力</h3>
                    <p class="member-card__title" data-i18n="supervision.member2_title">
                      初代厚生労働大臣 (元)<br />
                      東京医科大学医学部<br />
                      特任教授 医学博士
                    </p>
                  </div>
                </div>
              </div>

              <!-- Slide 3: 小野寺 敏 -->
              <div class="swiper-slide">
                <div class="member-card">
                  <div class="member-card__bg"></div>
                  <div class="member-card__img-wrapper">
                    <img class="member-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/member-3.png" alt="小野寺 敏" />
                  </div>
                  <div class="member-card__info">
                    <span class="member-card__en">Onodera Bin</span>
                    <h3 class="member-card__name">小野寺 敏</h3>
                    <p class="member-card__title" data-i18n="supervision.member3_title">
                      日本健康増進学術機構 理事長<br />
                      治未病医学総合研究所 所長<br />
                      治未病総合治療院 院長<br />
                      医学博士 精神対話士
                    </p>
                  </div>
                </div>
              </div>

              <!-- Slide 4: 清水 邦義 -->
              <div class="swiper-slide">
                <div class="member-card">
                  <div class="member-card__bg"></div>
                  <div class="member-card__img-wrapper">
                    <img class="member-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/member-4.png" alt="清水 邦義" />
                  </div>
                  <div class="member-card__info">
                    <span class="member-card__en">Simizu Kuniyoshi</span>
                    <h3 class="member-card__name">清水 邦義</h3>
                    <p class="member-card__title" data-i18n="supervision.member4_title">
                      日本健康増進学術機構 理事<br />
                      九州大学大学院農学研究院<br />
                      森林圏環境資源科学 准教授<br />
                      農学博士
                    </p>
                  </div>
                </div>
              </div>

              <!-- Slide 5: 辨野 義己 -->
              <div class="swiper-slide">
                <div class="member-card">
                  <div class="member-card__bg"></div>
                  <div class="member-card__img-wrapper">
                    <img class="member-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/member-5.png" alt="辨野 義己" />
                  </div>
                  <div class="member-card__info">
                    <span class="member-card__en">Benno Yoshimi</span>
                    <h3 class="member-card__name">辨野 義己</h3>
                    <p class="member-card__title" data-i18n="supervision.member5_title">
                      (財)「辨野腸内フローラ研究所」理事長<br />
                      国立研究開発法人理化学研究所<br />
                      名誉研究員 農学博士
                    </p>
                  </div>
                </div>
              </div>

              <!-- Slide 6: 大貫 宏一郎 -->
              <div class="swiper-slide">
                <div class="member-card">
                  <div class="member-card__bg"></div>
                  <div class="member-card__img-wrapper">
                    <img class="member-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/member-6.png" alt="大貫 宏一郎" />
                  </div>
                  <div class="member-card__info">
                    <span class="member-card__en">Ohnuki Koichiro</span>
                    <h3 class="member-card__name">大貫 宏一郎</h3>
                    <p class="member-card__title" data-i18n="supervision.member6_title">
                      日本健康増進学術機構 メンバー<br />
                      株式会社ユーザーライフサイエンス<br />
                      取締役会長 農学博士
                    </p>
                  </div>
                </div>
              </div>

              <!-- Slide 7: 工藤 真樹子 -->
              <div class="swiper-slide">
                <div class="member-card">
                  <div class="member-card__bg"></div>
                  <div class="member-card__img-wrapper">
                    <img class="member-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/member-7.png" alt="工藤 真樹子" />
                  </div>
                  <div class="member-card__info">
                    <span class="member-card__en">Kudo Makiko</span>
                    <h3 class="member-card__name">工藤 真樹子</h3>
                    <p class="member-card__title" data-i18n="supervision.member7_title">
                      日本健康増進学術機構 メンバー<br />
                      松村犬猫病院<br />
                      獣医師
                    </p>
                  </div>
                </div>
              </div>

              <!-- Slide 8: 三木 健輔 -->
              <div class="swiper-slide">
                <div class="member-card">
                  <div class="member-card__bg"></div>
                  <div class="member-card__img-wrapper">
                    <img class="member-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/member-8.png" alt="三木 健輔" />
                  </div>
                  <div class="member-card__info">
                    <span class="member-card__en">Miki Kensuke</span>
                    <h3 class="member-card__name">三木 健輔</h3>
                    <p class="member-card__title" data-i18n="supervision.member8_title">
                      日本健康増進学術機構 メンバー<br />
                      横浜市立大学 長寿科学研究室<br />
                      特任助教 理学博士
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Nút điều hướng & Pagination -->
      <div class="supervision__controls container">
        <div class="supervision__controls-left">
          <div class="supervision__nav">
            <button type="button" class="supervision__btn supervision__btn--prev" aria-label="前のスライド">
              <span>←</span>
            </button>
            <button type="button" class="supervision__btn supervision__btn--next" aria-label="次のスライド">
              <span>→</span>
            </button>
          </div>
          <div class="supervision__pagination"></div>
        </div>

        <p class="supervision__notice" data-i18n="supervision.notice">※一部の方のみご紹介させて頂いています。</p>
      </div>

      <!-- Chữ dọc nền trang trí -->
      <img class="supervision__deco reveal-deco" src="<?php echo get_template_directory_uri(); ?>/assets/img/deco-supervision.svg" alt="" aria-hidden="true" />
    </section>
    <section id="fields" class="fields">
      <div class="fields__inner container">
        <!-- Badge -->
        <span class="fields__badge" data-i18n="fields.badge">健康プログラムの詳細</span>

        <!-- Header -->
        <h2 class="fields__title reveal-up" data-i18n="fields.title">
          健康プログラムを構成する<br />
          <span>6つの分野</span>
        </h2>
        <span class="fields__divider"></span>

        <!-- Description -->
        <div class="fields__desc reveal-up">
          <p data-i18n="fields.desc1">本プログラムは、「学・測・動・食・癒・宿」の6つの分野を軸に構成された、<br class="u-pc" />滞在型の総合予防医療ウェルネスプログラムです。</p>
          <p data-i18n="fields.desc2">120名の専門家の知見と、阿蘇の雄大な自然環境が融合した、唯一無二の健康体験をご提供します。</p>
        </div>

        <!-- Grid of 6 Fields -->
        <div class="fields__grid reveal-stagger">
          
          <!-- Field 1: 学 -->
          <a href="#" class="field-card js-field-modal" data-field="1">
            <div class="field-card__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fields-img-01.jpg" alt="学" />
            </div>
            <div class="field-card__label">
              <span class="field-card__label-line" data-i18n="fields.card1_line1">ご夫婦で学び、</span>
              <span class="field-card__label-line" data-i18n="fields.card1_line2">ご自身の体を知る</span>
            </div>
            <div class="field-card__bottom">
              <span class="field-card__kanji">
                <svg viewBox="0 0 120 120" width="120" height="120">
                  <text x="60" y="95" text-anchor="middle">学</text>
                </svg>
              </span>
              <div class="field-card__link">
                <span data-i18n="fields.more">詳しく見る</span>
                <span class="field-card__arrow"><span>→</span></span>
              </div>
            </div>
          </a>

          <!-- Field 2: 測 -->
          <a href="#" class="field-card js-field-modal" data-field="2">
            <div class="field-card__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fields-img-02.jpg" alt="測" />
            </div>
            <div class="field-card__label">
              <span class="field-card__label-line" data-i18n="fields.card2_line1">15種類の最新機器で</span>
              <span class="field-card__label-line" data-i18n="fields.card2_line2">健康セルフチェック</span>
            </div>
            <div class="field-card__bottom">
              <span class="field-card__kanji">
                <svg viewBox="0 0 120 120" width="120" height="120">
                  <text x="60" y="95" text-anchor="middle">測</text>
                </svg>
              </span>
              <div class="field-card__link">
                <span data-i18n="fields.more">詳しく見る</span>
                <span class="field-card__arrow"><span>→</span></span>
              </div>
            </div>
          </a>

          <!-- Field 3: 動 -->
          <a href="#" class="field-card js-field-modal" data-field="3">
            <div class="field-card__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fields-img-03.jpg" alt="動" />
            </div>
            <div class="field-card__label">
              <span class="field-card__label-line" data-i18n="fields.card3_line1">自分の体力にあった</span>
              <span class="field-card__label-line" data-i18n="fields.card3_line2">効果的な運動体験</span>
            </div>
            <div class="field-card__bottom">
              <span class="field-card__kanji">
                <svg viewBox="0 0 120 120" width="120" height="120">
                  <text x="60" y="95" text-anchor="middle">動</text>
                </svg>
              </span>
              <div class="field-card__link">
                <span data-i18n="fields.more">詳しく見る</span>
                <span class="field-card__arrow"><span>→</span></span>
              </div>
            </div>
          </a>

          <!-- Field 4: 食 -->
          <a href="#" class="field-card js-field-modal" data-field="4">
            <div class="field-card__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fields-img-04.jpg" alt="食" />
            </div>
            <div class="field-card__label">
              <span class="field-card__label-line" data-i18n="fields.card4_line1">無農薬による</span>
              <span class="field-card__label-line" data-i18n="fields.card4_line2">自社栽培野菜を使用</span>
            </div>
            <div class="field-card__bottom">
              <span class="field-card__kanji">
                <svg viewBox="0 0 120 120" width="120" height="120">
                  <text x="60" y="95" text-anchor="middle">食</text>
                </svg>
              </span>
              <div class="field-card__link">
                <span data-i18n="fields.more">詳しく見る</span>
                <span class="field-card__arrow"><span>→</span></span>
              </div>
            </div>
          </a>

          <!-- Field 5: 癒 -->
          <a href="#" class="field-card js-field-modal" data-field="5">
            <div class="field-card__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fields-img-05.jpg" alt="癒" />
            </div>
            <div class="field-card__label">
              <span class="field-card__label-line" data-i18n="fields.card5_line1">100万㎡の施設と</span>
              <span class="field-card__label-line" data-i18n="fields.card5_line2">大自然に包まれる温浴体験。</span>
            </div>
            <div class="field-card__bottom">
              <span class="field-card__kanji">
                <svg viewBox="0 0 120 120" width="120" height="120">
                  <text x="60" y="95" text-anchor="middle">癒</text>
                </svg>
              </span>
              <div class="field-card__link">
                <span data-i18n="fields.more">詳しく見る</span>
                <span class="field-card__arrow"><span>→</span></span>
              </div>
            </div>
          </a>

          <!-- Field 6: 宿 -->
          <a href="#" class="field-card js-field-modal" data-field="6">
            <div class="field-card__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fields-img-06.jpg" alt="宿" />
            </div>
            <div class="field-card__label">
              <span class="field-card__label-line" data-i18n="fields.card6_line1">胎内空間が</span>
              <span class="field-card__label-line" data-i18n="fields.card6_line2">安らぎと良質な睡眠へ</span>
            </div>
            <div class="field-card__bottom">
              <span class="field-card__kanji">
                <svg viewBox="0 0 120 120" width="120" height="120">
                  <text x="60" y="95" text-anchor="middle">宿</text>
                </svg>
              </span>
              <div class="field-card__link">
                <span data-i18n="fields.more">詳しく見る</span>
                <span class="field-card__arrow"><span>→</span></span>
              </div>
            </div>
          </a>

        </div>

      </div>
      
      <!-- Outline decorative SVG "FIELDS" -->
      <img class="fields__deco reveal-deco" src="<?php echo get_template_directory_uri(); ?>/assets/img/deco-fields.svg" alt="" aria-hidden="true" />
    </section>
    <!-- ===================== WISHES ===================== -->
    <section id="wishes" class="wishes">
      <div class="wishes__grid">
        <!-- Panel 1 (Top-Left): Text & Cards -->
        <div class="wishes__panel wishes__panel--text wishes__panel--1 reveal-left">
          <h2 class="wishes__title" data-i18n="wishes.title1">家族への想い</h2>
          <div class="wishes__text">
            <p data-i18n="wishes.text1_p1">本健康プログラムは、単に“健康になる”ためのサービスではありません。<br class="u-pc" />大切な家族やパートナーと、<br class="u-pc" />これから先も安心して豊かに暮らしていくための<br class="u-pc" />「未来への備え」を提供する滞在型ウェルネスプログラムです。</p>
            <p data-i18n="wishes.text1_p2">健康でいることは、単に自分一人の体が丈夫である<br class="u-pc" />ということにとどまりません。<br class="u-pc" />それは、あなたを取り巻く「大切な人たち」の人生をも守り、<br />支えることにつながっています。</p>
          </div>

          <!-- 3 Cards -->
          <div class="wishes__cards">
            <div class="wish-card">
              <span class="wish-card__capsule" data-i18n="wishes.card1_capsule">自立</span>
              <p class="wish-card__text" data-i18n="wishes.card1_text">家族に<br />負担をかけない</p>
            </div>
            <div class="wish-card">
              <span class="wish-card__capsule" data-i18n="wishes.card2_capsule">予防</span>
              <p class="wish-card__text" data-i18n="wishes.card2_text">医療費の抑制</p>
            </div>
            <div class="wish-card">
              <span class="wish-card__capsule" data-i18n="wishes.card3_capsule">安心</span>
              <p class="wish-card__text" data-i18n="wishes.card3_text">精神的、<br />経済的な安心</p>
            </div>
          </div>

          <p class="wishes__note" data-i18n="wishes.note">「大切な家族・パートナー」のためにも、<br />いつまでも元気でいることは、社会的にも大きな価値を持ちます。</p>
        </div>

        <!-- Panel 2 (Top-Right): Image & CTA -->
        <div class="wishes__panel-wrapper wishes__panel-wrapper--2 reveal-right">
          <!-- Vertical background text "WISHES" inside the panel wrapper -->
          <img class="wishes__deco reveal-deco" src="<?php echo get_template_directory_uri(); ?>/assets/img/deco-wishes.svg" alt="" aria-hidden="true" />
          <div class="wishes__panel wishes__panel--media wishes__panel--2">
            <div class="wishes__img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/wishes-img-01.jpg" alt="家族と砂浜で凧揚げ" class="wishes__img" />
            </div>
          </div>
          <a href="#pricing" class="wishes__sticky-btn">
            <span class="wishes__sticky-btn-text" data-i18n="wishes.sticky_btn">予防医療宿泊プランを見る</span>
            <span class="wishes__sticky-btn-arrow"><span>→</span></span>
          </a>
        </div>

        <!-- Panel 3 (Bottom-Left): Image -->
        <div class="wishes__panel wishes__panel--media wishes__panel--3 reveal-left">
          <div class="wishes__img-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/wishes-img-02.jpg" alt="砂浜の遊歩道を歩く夫婦" class="wishes__img" />
          </div>
        </div>

        <!-- Panel 4 (Bottom-Right): Text -->
        <div class="wishes__panel wishes__panel--text wishes__panel--4 reveal-right">
          <h2 class="wishes__title" data-i18n="wishes.title2">健康は一生の付き合い</h2>
          <div class="wishes__text">
            <p data-i18n="wishes.text2_p1">これからもずっと動ける体と笑顔の毎日を。<br />健康は、一度手に入れたら終わりではありません。</p>
            <p data-i18n="wishes.text2_p2">大切なのは、今の自分の状態を「知ること」。<br />そして、無理のない範囲で新しい知恵を「取り入れること」。</p>
            <p data-i18n="wishes.text2_p3">この積み重ねが、5年後、10年後のあなたを支える<br />大きな安心に変わります。</p>
          </div>
        </div>
      </div>
    </section>
    <!-- ===================== PRICING ===================== -->
    <section id="pricing" class="pricing">
      <!-- Chữ trang trí nền -->
      <img class="pricing__deco reveal-deco" src="<?php echo get_template_directory_uri(); ?>/assets/img/deco-price.svg" alt="" aria-hidden="true" />

      <div class="pricing__inner container">
        <!-- Tiêu đề & Giới thiệu -->
        <div class="pricing__header reveal-up">
          <h2 class="pricing__title" data-i18n="pricing.title">ご宿泊プランと料金</h2>
          <span class="pricing__divider"></span>
          <div class="pricing__desc">
            <p data-i18n="pricing.desc">
              ご滞在を通じて健康習慣を身につける、ヘルスツーリズム認証取得プランです。<br />
              連続滞在で、講座・測定・運動・温浴・食事・睡眠を日ごとに組み合わせ体験し、<br />
              習慣化のきっかけをつくることを目的としています。
            </p>
          </div>
        </div>

        <!-- Khung Pricing -->
        <div class="pricing__card reveal-fade">
          <!-- Cột trái / Khối chính -->
          <div class="pricing__main-col">
            <div class="pricing__badge" data-i18n="pricing.badge">予防医療宿泊プラン</div>
            <p class="pricing__duration" data-i18n="pricing.duration">お一人様 5泊6日〜（2名1室利用時）</p>
            <div class="pricing__price">
              <span class="pricing__price-amount">300,000</span>
              <span class="pricing__price-unit" data-i18n="pricing.unit">円</span>
              <span class="pricing__price-tax" data-i18n="pricing.tax">(税込)</span>
            </div>
            <p class="pricing__plan-desc" data-i18n="pricing.plan_desc">
              ご夫婦それぞれのペースで、長時間の滞在により、<br class="u-pc">健康的な生活習慣をより深く身につけるプランです。
            </p>
          </div>

          <!-- Cột phải / Khối chi tiết -->
          <div class="pricing__details-col">
            <!-- Chi tiết dịch vụ -->
            <div class="pricing__inclusions">
              <h3 class="pricing__sub-title" data-i18n="pricing.inclusions_title">料金に含まれる内容</h3>
              <ul class="pricing__list">
                <li data-i18n="pricing.incl1">ご宿泊</li>
                <li data-i18n="pricing.incl2">専門家指定の健康食事（1日3食）</li>
                <li data-i18n="pricing.incl3">各種施設利用料</li>
                <li data-i18n="pricing.incl4">健康講座・測定・運動・温泉などのプログラム体験</li>
              </ul>
            </div>

            <!-- Tùy chọn thêm -->
            <div class="pricing__options">
              <h3 class="pricing__sub-title pricing__sub-title--option" data-i18n="pricing.option_title">オプション</h3>
              <div class="pricing__option-box">
                <h4 class="pricing__option-name" data-i18n="pricing.option_name">コンシェルジュサービス</h4>
                <p class="pricing__option-price">
                  <span class="pricing__option-label" data-i18n="pricing.option_label">1日あたり</span>
                  <span class="pricing__option-value">10,000</span>
                  <span class="pricing__option-currency" data-i18n="pricing.option_currency">円</span>
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Nút đặt phòng CTA -->
        <div class="pricing__cta">
          <a href="#" class="btn-booking js-reserve">
            <span class="btn-booking__text" data-i18n="common.reserve_now">今すぐ予約する</span>
            <span class="btn-booking__arrow"><span>→</span></span>
          </a>
        </div>
      </div>
    </section>
    <!-- ===================== SCHEDULE ===================== -->
    <section id="schedule" class="schedule">
      <!-- Chữ trang trí nền -->
      <img class="schedule__deco reveal-deco" src="<?php echo get_template_directory_uri(); ?>/assets/img/deco-schedule.svg" alt="" aria-hidden="true" />

      <div class="schedule__inner container">
        <!-- Header -->
        <div class="schedule__header reveal-up">
          <span class="schedule__badge-capsule" data-i18n="schedule.capsule">ご夫婦でのご利用例</span>
          <h2 class="schedule__title" data-i18n="schedule.title">5泊6日のモデルスケジュール</h2>
          <span class="schedule__divider"></span>
        </div>

        <!-- Timeline Area -->
        <div class="schedule__timeline reveal-stagger">
          <!-- Day 1 (Left) -->
          <div class="schedule__item schedule__item--left" data-day="1">
            <div class="schedule__badge">
              <span class="schedule__badge-day">DAY</span>
              <span class="schedule__badge-num">1</span>
            </div>
            <div class="schedule__connector">
              <span class="schedule__connector-line"></span>
              <span class="schedule__connector-dot"></span>
            </div>
            <div class="schedule__card">
              <h3 class="schedule__card-title" data-i18n="schedule.day1_title">健康状態を知るはじまり</h3>
              <p class="schedule__card-text" data-i18n="schedule.day1_text">
                チェックイン後はオリエンテーションと体の状態測定で体力年齢を確認。温泉と夕食で初日の体をゆっくり整えます。
              </p>
              <div class="schedule__media">
                <div class="schedule__img-wrap schedule__img-wrap--main">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedulf-1.jpg" alt="健康状態を知るはじまり (メイン)" class="schedule__img" />
                </div>
                <div class="schedule__img-wrap schedule__img-wrap--sub">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedulf-1-small.jpg" alt="健康状態を知るはじまり (サブ)" class="schedule__img" />
                </div>
              </div>
            </div>
          </div>

          <!-- Day 2 (Right) -->
          <div class="schedule__item schedule__item--right" data-day="2">
            <div class="schedule__badge">
              <span class="schedule__badge-day">DAY</span>
              <span class="schedule__badge-num">2</span>
            </div>
            <div class="schedule__connector">
              <span class="schedule__connector-line"></span>
              <span class="schedule__connector-dot"></span>
            </div>
            <div class="schedule__card">
              <h3 class="schedule__card-title" data-i18n="schedule.day2_title">学びとヨガで整える日</h3>
              <p class="schedule__card-text" data-i18n="schedule.day2_text">
                朝食後は健康知識を学びフリータイムを。昼食やヨガ、温泉で心体を無理なく整えます。
              </p>
              <div class="schedule__media">
                <div class="schedule__img-wrap schedule__img-wrap--main">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedulf-2.jpg" alt="学びとヨガで整える日 (メイン)" class="schedule__img" />
                </div>
                <div class="schedule__img-wrap schedule__img-wrap--sub">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedulf-2-small.jpg" alt="学びとヨガで整える日 (サブ)" class="schedule__img" />
                </div>
              </div>
            </div>
          </div>

          <!-- Day 3 (Left) -->
          <div class="schedule__item schedule__item--left" data-day="3">
            <div class="schedule__badge">
              <span class="schedule__badge-day">DAY</span>
              <span class="schedule__badge-num">3</span>
            </div>
            <div class="schedule__connector">
              <span class="schedule__connector-line"></span>
              <span class="schedule__connector-dot"></span>
            </div>
            <div class="schedule__card">
              <h3 class="schedule__card-title" data-i18n="schedule.day3_title">運動と温熱で整える日</h3>
              <p class="schedule__card-text" data-i18n="schedule.day3_text">
                健康トレーニング館で体力に合わせた運動を。昼食後は温熱窯や温泉を楽しみながら、フリータイムでリラックスします。
              </p>
              <div class="schedule__media">
                <div class="schedule__img-wrap schedule__img-wrap--main">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedulf-3.jpg" alt="運動と温熱で整える日 (メイン)" class="schedule__img" />
                </div>
                <div class="schedule__img-wrap schedule__img-wrap--sub">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedulf-3-small.jpg" alt="運動と温熱で整える日 (サブ)" class="schedule__img" />
                </div>
              </div>
            </div>
          </div>

          <!-- Day 4 (Right) -->
          <div class="schedule__item schedule__item--right" data-day="4">
            <div class="schedule__badge">
              <span class="schedule__badge-day">DAY</span>
              <span class="schedule__badge-num">4</span>
            </div>
            <div class="schedule__connector">
              <span class="schedule__connector-line"></span>
              <span class="schedule__connector-dot"></span>
            </div>
            <div class="schedule__card">
              <h3 class="schedule__card-title" data-i18n="schedule.day4_title">阿蘇の名所を巡る一日</h3>
              <p class="schedule__card-text" data-i18n="schedule.day4_text">
                朝食後は菊池渓谷や大観峰など阿蘇周辺の観光地を巡り、温泉と夕食で旅の疲れをゆっくり癒します。
              </p>
              <div class="schedule__media">
                <div class="schedule__img-wrap schedule__img-wrap--main">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedulf-4.jpg" alt="阿蘇の名所を巡る一日 (メイン)" class="schedule__img" />
                </div>
                <div class="schedule__img-wrap schedule__img-wrap--sub">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedulf-4-small.jpg" alt="阿蘇の名所を巡る一日 (サブ)" class="schedule__img" />
                </div>
              </div>
            </div>
          </div>

          <!-- Day 5 (Left) -->
          <div class="schedule__item schedule__item--left" data-day="5">
            <div class="schedule__badge">
              <span class="schedule__badge-day">DAY</span>
              <span class="schedule__badge-num">5</span>
            </div>
            <div class="schedule__connector">
              <span class="schedule__connector-line"></span>
              <span class="schedule__connector-dot"></span>
            </div>
            <div class="schedule__card">
              <h3 class="schedule__card-title" data-i18n="schedule.day5_title">ご夫婦で自由に過ごす日</h3>
              <p class="schedule__card-text" data-i18n="schedule.day5_text">
                早朝はフリータイムから始まります。朝食後はドーム還元浴や観光、昼食を楽しみ、温泉と夕食で穏やかに過ごします。
              </p>
              <div class="schedule__media">
                <div class="schedule__img-wrap schedule__img-wrap--main">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedulf-5.jpg" alt="ご夫婦で自由に過ごす日 (メイン)" class="schedule__img" />
                </div>
                <div class="schedule__img-wrap schedule__img-wrap--sub">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedulf-5-small.jpg" alt="ご夫婦で自由に過ごす日 (サブ)" class="schedule__img" />
                </div>
              </div>
            </div>
          </div>

          <!-- Day 6 (Right) -->
          <div class="schedule__item schedule__item--right" data-day="6">
            <div class="schedule__badge">
              <span class="schedule__badge-day">DAY</span>
              <span class="schedule__badge-num">6</span>
            </div>
            <div class="schedule__connector">
              <span class="schedule__connector-line"></span>
              <span class="schedule__connector-dot"></span>
            </div>
            <div class="schedule__card">
              <h3 class="schedule__card-title" data-i18n="schedule.day6_title">変化を確認し旅を結ぶ日</h3>
              <p class="schedule__card-text" data-i18n="schedule.day6_text">
                朝食後はチェックアウトし最終測定をします。健康キャンパスでの滞在を振り返り、出発までフリータイムを楽しめます。
              </p>
              <div class="schedule__media">
                <div class="schedule__img-wrap schedule__img-wrap--main">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedulf-6.jpg" alt="変化を確認し旅を結ぶ日 (メイン)" class="schedule__img" />
                </div>
                <div class="schedule__img-wrap schedule__img-wrap--sub">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedulf-6-small.jpg" alt="変化を確認し旅を結ぶ日 (サブ)" class="schedule__img" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- CTA Button -->
        <div class="schedule__cta">
          <a href="#" class="btn-booking btn-booking--schedule js-reserve js-schedule-detail-trigger">
            <span class="btn-booking__text" data-i18n="schedule.cta">スケジュール詳細を見る</span>
            <span class="btn-booking__arrow"><span>→</span></span>
          </a>
        </div>
      </div>
    </section>
    <!-- ===================== ACCESS ===================== -->
    <section id="access" class="access">
      <img class="access__deco reveal-deco" src="<?php echo get_template_directory_uri(); ?>/assets/img/deco-access.svg" alt="" aria-hidden="true" />
      <div class="access__inner container">
        <div class="access__header reveal-up">
          <h2 class="access__title" data-i18n="access.title">アクセス</h2>
          <span class="access__divider"></span>
        </div>
        <p class="access__intro reveal-up" data-i18n="access.intro">
          阿蘇の雄大な自然に包まれた特別なロケーションでありながら、<br />
          主要空港や駅からもアクセスしやすい環境です。
        </p>

        <div class="access__card reveal-fade">
          <div class="access__grid">
            <!-- Left Column: Transport Info -->
            <div class="access__info">
              <!-- Location block -->
              <div class="access__block">
                <h3 class="access__block-title" data-i18n="access.location_title">所在地</h3>
                <div class="access__address-details">
                  <p class="access__zip">〒869-1404</p>
                  <p class="access__address" data-i18n="access.address">熊本県阿蘇郡南阿蘇村河陽5579-3</p>
                </div>
              </div>

              <!-- Access block -->
              <div class="access__block access__block--transit">
                <h3 class="access__block-title" data-i18n="access.transit_title">主要な交通機関からのアクセス</h3>
                
                <div class="access__transit-list">
                  <!-- Airport -->
                  <div class="access__transit-item">
                    <div class="access__transit-icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/access-icon-01.svg" alt="空港" />
                    </div>
                    <div class="access__transit-content">
                      <h4 class="access__transit-title" data-i18n="access.airport_title">空港からお越しのお客様</h4>
                      <p class="access__transit-desc" data-i18n="access.airport_desc1">熊本空港から 車で約30分</p>
                      <p class="access__transit-desc" data-i18n="access.airport_desc2">福岡空港から 車で約135分</p>
                    </div>
                  </div>

                  <!-- Train -->
                  <div class="access__transit-item">
                    <div class="access__transit-icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/access-icon-02.svg" alt="電車" />
                    </div>
                    <div class="access__transit-content">
                      <h4 class="access__transit-title" data-i18n="access.train_title">電車でお越しのお客様</h4>
                      <p class="access__transit-desc" data-i18n="access.train_desc1">JR阿蘇駅から タクシーで約20分</p>
                      <p class="access__transit-desc" data-i18n="access.train_desc2">JR赤水駅から タクシーで約7分</p>
                    </div>
                  </div>

                  <!-- Car -->
                  <div class="access__transit-item">
                    <div class="access__transit-icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/access-icon-03.svg" alt="車" />
                    </div>
                    <div class="access__transit-content">
                      <h4 class="access__transit-title" data-i18n="access.car_title">お車でお越しのお客様</h4>
                      <p class="access__transit-desc" data-i18n="access.car_desc1">熊本市内から 車で約60分</p>
                      <p class="access__transit-desc" data-i18n="access.car_desc2">福岡方面から 高速道路利用でアクセスが可能</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Right Column: Map and CTA -->
            <div class="access__map-col">
              <div class="access__map-wrap">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/access-img-01.jpg" alt="アクセスマップ" class="access__map-img" />
              </div>
              <div class="access__buttons">
                <a href="https://maps.google.com/?q=熊本県阿蘇郡南阿蘇村河陽5579-3" target="_blank" rel="noopener noreferrer" class="btn-access btn-access--primary">
                  <span data-i18n="access.btn_map">Google Mapで見る</span>
                </a>
                <a href="https://maps.google.com/maps?daddr=熊本県阿蘇郡南阿蘇村河陽5579-3" target="_blank" rel="noopener noreferrer" class="btn-access btn-access--outline">
                  <span data-i18n="access.btn_route">経路を見る</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ===================== FAQ ===================== -->
    <section id="faq" class="faq">
      <img class="faq__deco reveal-deco" src="<?php echo get_template_directory_uri(); ?>/assets/img/deco-faq.svg" alt="" aria-hidden="true" />
      <div class="faq__inner container">
        <div class="faq__header">
          <h2 class="faq__title" data-i18n="faq.title">よくあるご質問</h2>
          <span class="faq__divider"></span>
        </div>

        <div class="faq__list">
          <!-- Item 1 (Open by default) -->
          <div class="faq__item is-open">
            <button class="faq__item-header" aria-expanded="true">
              <span class="faq__question-num">Q.</span>
              <span class="faq__question-text" data-i18n="faq.q1">最低何泊から滞在できますか？</span>
              <span class="faq__toggle-icon" aria-hidden="true"></span>
            </button>
            <div class="faq__answer-wrapper">
              <div class="faq__answer-inner">
                <div class="faq__answer-content">
                  <span class="faq__answer-num">A.</span>
                  <p class="faq__answer-text" data-i18n="faq.a1">
                    本プログラムは、5泊6日以上の滞在を推奨しております。短期滞在ではなく、食事・運動・温熱・睡眠を通じて生活習慣を整えることで、より深い健康体験をご提供します。
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Item 2 -->
          <div class="faq__item">
            <button class="faq__item-header" aria-expanded="false">
              <span class="faq__question-num">Q.</span>
              <span class="faq__question-text" data-i18n="faq.q2">夫婦で参加できますか？</span>
              <span class="faq__toggle-icon" aria-hidden="true"></span>
            </button>
            <div class="faq__answer-wrapper">
              <div class="faq__answer-inner">
                <div class="faq__answer-content">
                  <span class="faq__answer-num">A.</span>
                  <p class="faq__answer-text" data-i18n="faq.a2">
                    はい。ご夫婦でのご参加を推奨しております。お互いの健康状態を見つめ直しながら、これから先の人生をより豊かに過ごすための時間としてご利用いただけます。
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Item 3 -->
          <div class="faq__item">
            <button class="faq__item-header" aria-expanded="false">
              <span class="faq__question-num">Q.</span>
              <span class="faq__question-text" data-i18n="faq.q3">医療行為や治療を行う施設ですか？</span>
              <span class="faq__toggle-icon" aria-hidden="true"></span>
            </button>
            <div class="faq__answer-wrapper">
              <div class="faq__answer-inner">
                <div class="faq__answer-content">
                  <span class="faq__answer-num">A.</span>
                  <p class="faq__answer-text" data-i18n="faq.a3">
                    本プログラムは、病気の治療を目的とした医療施設ではありません。予防医療・ウェルネス・生活習慣改善を目的とした滞在型健康増進プログラムです。
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Item 4 -->
          <div class="faq__item">
            <button class="faq__item-header" aria-expanded="false">
              <span class="faq__question-num">Q.</span>
              <span class="faq__question-text" data-i18n="faq.q4">運動が苦手でも参加できますか？</span>
              <span class="faq__toggle-icon" aria-hidden="true"></span>
            </button>
            <div class="faq__answer-wrapper">
              <div class="faq__answer-inner">
                <div class="faq__answer-content">
                  <span class="faq__answer-num">A.</span>
                  <p class="faq__answer-text" data-i18n="faq.a4">
                    もちろん可能です。年齢や体力に合わせて、無理なく取り組めるプログラムをご用意しております。健康測定をもとに、ご自身に合ったペースでご参加いただけます。
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Item 5 -->
          <div class="faq__item">
            <button class="faq__item-header" aria-expanded="false">
              <span class="faq__question-num">Q.</span>
              <span class="faq__question-text" data-i18n="faq.q5">食事制限やアレルギーへの対応は可能ですか？</span>
              <span class="faq__toggle-icon" aria-hidden="true"></span>
            </button>
            <div class="faq__answer-wrapper">
              <div class="faq__answer-inner">
                <div class="faq__answer-content">
                  <span class="faq__answer-num">A.</span>
                  <p class="faq__answer-text" data-i18n="faq.a5">
                    可能な限り対応しております。アレルギーや食事制限、ベジタリアン対応などについては、ご予約時に事前にご相談ください。
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Item 6 -->
          <div class="faq__item">
            <button class="faq__item-header" aria-expanded="false">
              <span class="faq__question-num">Q.</span>
              <span class="faq__question-text" data-i18n="faq.q6">英語での対応は可能ですか？</span>
              <span class="faq__toggle-icon" aria-hidden="true"></span>
            </button>
            <div class="faq__answer-wrapper">
              <div class="faq__answer-inner">
                <div class="faq__answer-content">
                  <span class="faq__answer-num">A.</span>
                  <p class="faq__answer-text" data-i18n="faq.a6">
                    海外からのお客様にも安心してご滞在いただけるよう、英語対応を順次整備しております。事前にご相談いただければ、できる限りサポートいたします。
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Item 7 -->
          <div class="faq__item">
            <button class="faq__item-header" aria-expanded="false">
              <span class="faq__question-num">Q.</span>
              <span class="faq__question-text" data-i18n="faq.q7">料金には何が含まれていますか</span>
              <span class="faq__toggle-icon" aria-hidden="true"></span>
            </button>
            <div class="faq__answer-wrapper">
              <div class="faq__answer-inner">
                <div class="faq__answer-content">
                  <span class="faq__answer-num">A.</span>
                  <p class="faq__answer-text" data-i18n="faq.a7">
                    宿泊費、ご指定のお食事、健康施設利用料が含まれております。詳細は<a href="#pricing" class="faq__link">プラン内容</a>をご確認ください。
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Item 8 -->
          <div class="faq__item">
            <button class="faq__item-header" aria-expanded="false">
              <span class="faq__question-num">Q.</span>
              <span class="faq__question-text" data-i18n="faq.q8">コンシェルジュサービスはありますか？</span>
              <span class="faq__toggle-icon" aria-hidden="true"></span>
            </button>
            <div class="faq__answer-wrapper">
              <div class="faq__answer-inner">
                <div class="faq__answer-content">
                  <span class="faq__answer-num">A.</span>
                  <p class="faq__answer-text" data-i18n="faq.a8">
                    はい。より快適な滞在をサポートするコンシェルジュサービスをご用意しております。ご利用をご希望の場合は、予約ページにてコンシェルジュオプションを選択してください。
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Item 9 -->
          <div class="faq__item">
            <button class="faq__item-header" aria-expanded="false">
              <span class="faq__question-num">Q.</span>
              <span class="faq__question-text" data-i18n="faq.q9">滞在前に相談することはできますか？</span>
              <span class="faq__toggle-icon" aria-hidden="true"></span>
            </button>
            <div class="faq__answer-wrapper">
              <div class="faq__answer-inner">
                <div class="faq__answer-content">
                  <span class="faq__answer-num">A.</span>
                  <p class="faq__answer-text" data-i18n="faq.a9">
                    はい。ご不安な点や健康状態、滞在目的などについて、事前相談を承っております。<a href="#contact" class="faq__link faq__link--underline">お問い合わせはこちら</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>

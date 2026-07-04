/* ============================================================
   i18n.js — language switching for the static LP.
   Default + fallback: Japanese (ja, kept inline in the HTML).
   Switchable: zh-Hant (Traditional Chinese), ko (Korean).
   Vanilla JS, no dependencies. Dropdown open/close is handled
   by nav.js; this file only performs the locale switch.
   ============================================================ */
(function () {
  "use strict";

  var ALLOWED = ["ja", "zh-Hant", "ko", "en"];
  var DEFAULT_LANG = "ja";

  /* Label shown on the toggle button for each locale. */
  var TOGGLE_LABEL = {
    ja: "JP",
    "zh-Hant": "中文",
    ko: "한국어",
    en: "EN"
  };

  /* <html lang> value per locale. */
  var HTML_LANG = {
    ja: "ja",
    "zh-Hant": "zh-Hant",
    ko: "ko",
    en: "en"
  };

  /* ---------------------------------------------------------
     META (document title + description / OG) per locale.
     --------------------------------------------------------- */
  var META = {
    ja: {
      title: "大自然阿蘇 健康の森 | 世界最高水準の総合予防医療施設",
      desc: "大自然阿蘇 健康の森 — 世界最高水準の総合予防医療施設。定年退職後の新しい健康習慣を提案する滞在型健康増進プログラム。"
    },
    "zh-Hant": {
      title: "大自然阿蘇 健康之森 | 世界頂級綜合預防醫療設施",
      desc: "大自然阿蘇 健康之森 — 世界頂級綜合預防醫療設施。為退休後的全新健康習慣量身打造的住宿型健康促進計畫。"
    },
    ko: {
      title: "오아소 자연 건강의 숲 | 세계 최고 수준의 종합 예방의료 시설",
      desc: "오아소 자연 건강의 숲 — 세계 최고 수준의 종합 예방의료 시설. 은퇴 후 새로운 건강 습관을 제안하는 체류형 건강증진 프로그램."
    },
    en: {
      title: "Oaso Shizen Kenko no Mori | World-Class Comprehensive Preventive-Medicine Facility",
      desc: "Oaso Shizen Kenko no Mori — a world-class comprehensive preventive-medicine facility. A stay-type health-promotion program proposing new health habits for life after retirement."
    }
  };

  /* ---------------------------------------------------------
     Translation dictionaries.
     Values are innerHTML (may contain <br>/<span> markup that
     mirrors the Japanese source so the CSS keeps working).
     A missing key falls back to the cached Japanese original.
     --------------------------------------------------------- */
  var I18N = {
    "zh-Hant": {
      /* ---- Header / nav ---- */
      "nav.program": "健康計畫詳情",
      "nav.pricing": "住宿方案與費用",
      "nav.access": "交通方式",
      "nav.faq": "常見問題",
      "header.contact": "聯絡我們",
      "header.reserve": "立即預約",

      /* ---- Drawer (SP) ---- */
      "drawer.program": "何謂住宿型健康促進計畫",
      "drawer.supervision": "由日本健康促進學術機構全面監修",
      "drawer.fields": "構成健康計畫的六大領域",
      "drawer.wishes": "對家人的心意",
      "drawer.pricing": "住宿方案與費用",
      "drawer.access": "交通方式",
      "drawer.faq": "常見問題",
      "drawer.reserve": "立即預約",
      "drawer.contact": "諮詢・洽詢請由此進",

      /* ---- Hero ---- */
      "hero.title": '<span class="hero__title-top">世界頂級<span class="hero__title-of">的</span></span><span class="hero__title-main">綜合預防醫療設施</span>',
      "hero.tag": "退休後的全新健康習慣",
      "hero.reserve_tag": "住宿型健康促進計畫",
      "hero.reserve_label": '立即預約<span class="hero__reserve-arrow" aria-hidden="true">›</span>',

      /* ---- Program ---- */
      "program.title": "何謂住宿型健康促進計畫",
      "program.p1": '本計畫是<br class="u-sp" />以六十歲前後即將退休的族群為中心，<br class="u-pc" />專為退休人士設計的住宿型健康促進計畫。',
      "program.p2": '以人生轉折期中「重新定義健康並使其成為習慣」為目標，<br class="u-pc" />提供以科學實證為依據的實踐型學習與體驗。',
      "program.p3": '這裡不只是單純的健康設施，更是實現無悔第二人生的<br class="u-pc" />「健康登龍門」。夫妻一同參與，<br />為今後自立自主的人生奠定穩固基礎。',
      "program.p4": '為了珍愛的家人，也為了能永保活力。<br class="u-pc" />更為了富足的晚年，我們以延長健康壽命為目標。',

      /* ---- Supervision ---- */
      "supervision.subtitle": "一般社團法人",
      "supervision.title": "由日本健康促進學術機構全面監修",
      "supervision.desc1": '在本住宿型健康促進計畫中，融合計畫餐飲・醫療・預防・自然之力，<br class="u-pc" />提供眾多專家共同淬鍊出的獨一無二健康體驗。',
      "supervision.desc2": "真心為您未來的健康著想，答案就在這裡。",
      "supervision.member1_title": "日本健康促進學術機構 理事<br />（一財）博慈會 老人病研究所 所長<br />醫學博士",
      "supervision.member2_title": "首任厚生勞動大臣（前）<br />東京醫科大學醫學部<br />特任教授 醫學博士",
      "supervision.member3_title": "日本健康促進學術機構 理事長<br />治未病醫學綜合研究所 所長<br />治未病綜合治療院 院長<br />醫學博士 精神對話士",
      "supervision.member4_title": "日本健康促進學術機構 理事<br />九州大學研究所農學研究院<br />森林圈環境資源科學 副教授<br />農學博士",
      "supervision.member5_title": "（財）「辨野腸內菌叢研究所」理事長<br />國立研究開發法人理化學研究所<br />名譽研究員 農學博士",
      "supervision.member6_title": "日本健康促進學術機構 成員<br />User Life Science 股份有限公司<br />董事長 農學博士",
      "supervision.member7_title": "日本健康促進學術機構 成員<br />松村犬貓醫院<br />獸醫師",
      "supervision.member8_title": "日本健康促進學術機構 成員<br />橫濱市立大學 長壽科學研究室<br />特任助教 理學博士",
      "supervision.notice": "※僅介紹部分專家。",

      /* ---- Fields ---- */
      "fields.badge": "健康計畫詳情",
      "fields.title": '構成健康計畫的<br /><span>六大領域</span>',
      "fields.desc1": '本計畫以「學・測・動・食・癒・宿」六大領域為主軸構成，<br class="u-pc" />是一套住宿型綜合預防醫療養生計畫。',
      "fields.desc2": "融合一百二十位專家的智慧與阿蘇雄偉的自然環境，為您獻上獨一無二的健康體驗。",
      "fields.card1_line1": "夫妻一同學習，",
      "fields.card1_line2": "了解自己的身體",
      "fields.card2_line1": "以十五種最新儀器",
      "fields.card2_line2": "進行健康自我檢測",
      "fields.card3_line1": "依自身體能",
      "fields.card3_line2": "進行有效的運動體驗",
      "fields.card4_line1": "採用無農藥",
      "fields.card4_line2": "自家栽培蔬菜",
      "fields.card5_line1": "於一百萬平方公尺的設施與",
      "fields.card5_line2": "大自然環抱中的溫浴體驗。",
      "fields.card6_line1": "胎內空間",
      "fields.card6_line2": "帶來安寧與優質睡眠",
      "fields.more": "查看詳情",

      /* ---- Wishes ---- */
      "wishes.title1": "對家人的心意",
      "wishes.text1_p1": '本健康計畫並非僅是「變健康」的服務。<br class="u-pc" />而是讓您與珍愛的家人或伴侶，<br class="u-pc" />在今後也能安心富足地生活，<br class="u-pc" />提供「為未來做好準備」的住宿型養生計畫。',
      "wishes.text1_p2": '健康，不僅止於自己一人身體強健<br class="u-pc" />這件事而已。<br class="u-pc" />它更與守護並支持您身邊「重要之人」的人生<br />緊密相連。',
      "wishes.card1_capsule": "自立",
      "wishes.card1_text": "不為家人<br />增添負擔",
      "wishes.card2_capsule": "預防",
      "wishes.card2_text": "抑制醫療費用",
      "wishes.card3_capsule": "安心",
      "wishes.card3_text": "精神與<br />經濟上的安心",
      "wishes.note": "為了「珍愛的家人・伴侶」，<br />永保活力健康，在社會層面也具有重大的價值。",
      "wishes.sticky_btn": "查看預防醫療住宿方案",
      "wishes.title2": "健康是一輩子的事",
      "wishes.text2_p1": "願您往後也能擁有活動自如的身體與充滿笑容的每一天。<br />健康並非一旦獲得便能高枕無憂。",
      "wishes.text2_p2": "重要的是「了解」當下自身的狀態。<br />並在不勉強的範圍內「吸收」全新的知識。",
      "wishes.text2_p3": "這份點滴累積，將化為支撐五年後、十年後的您的<br />莫大安心。",

      /* ---- Pricing ---- */
      "pricing.title": "住宿方案與費用",
      "pricing.desc": "這是一套透過住宿養成健康習慣、取得健康旅遊認證的方案。<br />在連續住宿期間，每天搭配體驗講座・測量・運動・溫浴・餐飲・睡眠，<br />旨在為養成習慣創造契機。",
      "pricing.badge": "預防醫療住宿方案",
      "pricing.duration": "每人 五晚六日起（兩人一室時）",
      "pricing.unit": "日圓",
      "pricing.tax": "（含稅）",
      "pricing.plan_desc": "讓夫妻倆能以各自的步調，透過長時間的住宿，更深入地養成健康的生活習慣。",
      "pricing.inclusions_title": "費用包含內容",
      "pricing.incl1": "住宿",
      "pricing.incl2": "專家指定的健康餐飲（每日三餐）",
      "pricing.incl3": "各項設施使用費",
      "pricing.incl4": "健康講座・測量・運動・溫泉等計畫體驗",
      "pricing.option_title": "附加選項",
      "pricing.option_name": "禮賓服務",
      "pricing.option_label": "每日",
      "pricing.option_currency": "日圓",

      /* ---- Common ---- */
      "common.reserve_now": "立即預約",
      "common.close": "關閉",

      /* ---- Contact modal ---- */
      "contact.name_label": '姓名 <span class="text-danger">*</span>',
      "contact.name_placeholder": "例：阿蘇 太郎",
      "contact.email_label": '電子郵件 <span class="text-danger">*</span>',
      "contact.tel_label": '電話號碼 <span class="text-danger">*</span>',
      "contact.subject_label": '諮詢內容類型 <span class="text-danger">*</span>',
      "contact.subject_opt1": "五晚六日方案臨時預約",
      "contact.subject_opt2": "諮詢・其他洽詢",
      "contact.message_label": "您的問題・需求",
      "contact.message_placeholder": "如有飲食限制、過敏或接送相關需求，請於此處填寫。",
      "contact.policy_text": '您所填寫的資訊，將依本公司個人資料保護方針嚴格管理。<br />請確認本公司的<a href="#" class="js-privacy-trigger contact-modal__policy-link">個人資料保護方針</a>，並於同意後送出。',
      "contact.agree": '我同意<span class="text-danger">*</span>',
      "contact.submit": "送出",

      /* ---- Schedule ---- */
      "schedule.capsule": "夫妻使用範例",
      "schedule.title": "五晚六日的示範行程",
      "schedule.day1_title": "了解健康狀態的起點",
      "schedule.day1_text": "辦理入住後，透過說明會與身體狀態測量確認體能年齡。以溫泉與晚餐，悠然調理首日的身心。",
      "schedule.day2_title": "以學習與瑜伽調理身心之日",
      "schedule.day2_text": "早餐後學習健康知識並享受自由時間。透過午餐、瑜伽、溫泉，輕鬆自在地調理身心。",
      "schedule.day3_title": "以運動與溫熱調理身心之日",
      "schedule.day3_text": "在健康訓練館進行符合體能的運動。午餐後一邊享受溫熱窯與溫泉，一邊於自由時間中放鬆。",
      "schedule.day4_title": "走訪阿蘇名勝的一日",
      "schedule.day4_text": "早餐後走訪菊池溪谷、大觀峰等阿蘇周邊的觀光勝地，再以溫泉與晚餐悠然撫慰旅途的疲憊。",
      "schedule.day5_title": "夫妻自由度過之日",
      "schedule.day5_text": "清晨從自由時間開始。早餐後享受圓頂還原浴、觀光與午餐，再以溫泉與晚餐平靜度過。",
      "schedule.day6_title": "確認改變、為旅程畫下句點之日",
      "schedule.day6_text": "早餐後辦理退房並進行最終測量。回顧在健康園區的這段時光，直到出發前都能盡情享受自由時間。",
      "schedule.cta": "查看行程詳情",

      /* ---- Schedule detail modal (5泊6日) ---- */
      "smodal.title": '健康計畫 <span>(五晚六日)</span><br />詳細行程',
      "smodal.note": "※請放大畫面查看",
      "smodal.checkin": "辦理入住",
      "smodal.pavilion_measure": '健康展館<br />(測量)',
      "smodal.fitness_age": "體能年齡測量",
      "smodal.onsen": "溫泉",
      "smodal.dinner": "晚餐",
      "smodal.sleep": "睡眠",
      "smodal.breakfast": "早餐",
      "smodal.campus": '健康園區',
      "smodal.freetime_walk": '自由時間<br />(散步等)',
      "smodal.lunch_buffet": '午餐<br />自助餐',
      "smodal.yoga": "瑜伽",
      "smodal.training": '健康<br />訓練館',
      "smodal.thermal": '溫熱棟<br />13種',
      "smodal.freetime": "自由時間",
      "smodal.day_tour": "一日觀光",
      "smodal.spot_daikanbo": "・大觀峰",
      "smodal.spot_shirakawa": "・白川水源",
      "smodal.spot_myojin": "・明神池名水公園",
      "smodal.spot_kikuchi": "・菊池溪谷",
      "smodal.couple_walk": "夫妻清晨散步",
      "smodal.dome_bath": "圓頂還原浴",
      "smodal.kinokotei_lunch": "蘑菇亭午餐",
      "smodal.local_tour": "當地觀光",
      "smodal.local_tour_sub": '上色見熊野<br />座神社',
      "smodal.checkout": "辦理退房",
      "smodal.pavilion_final": '健康展館<br />(最終測量)',
      "smodal.campus_review": '健康園區<br />(回顧滯留)',
      "smodal.freetime_departure": '自由時間<br />・出發',

      /* ---- Access ---- */
      "access.title": "交通方式",
      "access.intro": "雖坐擁阿蘇雄偉自然環抱的特別地點，<br />卻同時擁有從主要機場與車站皆便於前往的優越環境。",
      "access.location_title": "所在地",
      "access.transit_title": "從主要交通樞紐前來的方式",
      "access.airport_title": "搭乘飛機前來的貴賓",
      "access.airport_desc1": "從熊本機場 開車約30分鐘",
      "access.airport_desc2": "從福岡機場 開車約135分鐘",
      "access.train_title": "搭乘電車前來的貴賓",
      "access.train_desc1": "從JR阿蘇站 搭計程車約20分鐘",
      "access.train_desc2": "從JR赤水站 搭計程車約7分鐘",
      "access.car_title": "自行開車前來的貴賓",
      "access.car_desc1": "從熊本市區 開車約60分鐘",
      "access.car_desc2": "從福岡方向 可利用高速公路前往",
      "access.address": "熊本縣阿蘇郡南阿蘇村河陽5579-3",
      "access.btn_map": "在 Google 地圖中查看",
      "access.btn_route": "查看路線",

      /* ---- FAQ ---- */
      "faq.title": "常見問題",
      "faq.q1": "最少需住宿幾晚才能參加？",
      "faq.a1": "本計畫建議住宿五晚六日以上。我們提供的並非短期住宿，而是透過餐飲・運動・溫熱・睡眠調整生活習慣，為您獻上更深層的健康體驗。",
      "faq.q2": "可以夫妻一同參加嗎？",
      "faq.a2": "可以，我們十分推薦夫妻一同參加。在重新檢視彼此健康狀態的同時，也能將其作為今後更富足度過人生的寶貴時光。",
      "faq.q3": "這是進行醫療行為或治療的設施嗎？",
      "faq.a3": "本計畫並非以治療疾病為目的的醫療設施，而是以預防醫療・養生・改善生活習慣為目的的住宿型健康促進計畫。",
      "faq.q4": "不擅長運動也能參加嗎？",
      "faq.a4": "當然可以。我們備有依年齡與體能、能輕鬆無負擔進行的計畫。可依健康測量結果，以適合自己的步調參加。",
      "faq.q5": "可以配合飲食限制或過敏需求嗎？",
      "faq.a5": "我們會盡可能配合。關於過敏、飲食限制、素食對應等需求，敬請於預約時事先洽詢。",
      "faq.q6": "可以使用英語溝通嗎？",
      "faq.a6": "為了讓海外的貴賓也能安心住宿，我們正陸續完善英語服務。若能事先洽詢，我們將盡力提供協助。",
      "faq.q7": "費用包含哪些內容？",
      "faq.a7": '費用包含住宿費、指定餐飲及健康設施使用費。詳情請參閱<a href="#pricing" class="faq__link">方案內容</a>。',
      "faq.q8": "有提供禮賓服務嗎？",
      "faq.a8": "有的。我們備有能讓您住宿更為舒適的禮賓服務。若有需求，請於預約頁面選擇禮賓附加選項。",
      "faq.q9": "可以在住宿前先行諮詢嗎？",
      "faq.a9": '可以。關於您擔憂的事項、健康狀態、住宿目的等，我們皆受理事前諮詢。<a href="#contact" class="faq__link faq__link--underline">洽詢請由此進</a>',

      /* ---- Footer ---- */
      "footer.cta_title": '在罹病之前的階段，重新檢視生活習慣<br /><span class="footer__cta-highlight">真正的健康打造，就從這裡開始。</span>',
      "footer.reserve": "立即預約",
      "footer.contact": "諮詢・洽詢請由此進",
      "footer.hours": "全年無休／預約受理時間 9:00〜17:00",
      "footer.nav_program": "何謂住宿型健康促進計畫",
      "footer.nav_supervision": "由日本健康促進學術機構全面監修",
      "footer.nav_fields": "構成健康計畫的六大領域",
      "footer.nav_wishes": "對家人的心意",
      "footer.nav_pricing": "住宿方案與費用",
      "footer.nav_access": "交通方式",
      "footer.nav_faq": "常見問題",
      "footer.nav_contact": "諮詢・洽詢",
      "footer.nav_privacy": "隱私權政策",
      "footer.address": "〒869-1404 熊本縣阿蘇郡南阿蘇村河陽5579-3",

      /* ---- Modal: Field 1 (學) ---- */
      "modal.field1.title": "夫妻一同學習，<br>了解自己的身體",
      "modal.field1.p1": "健康的打造，始於了解自己的身體。<br>在日本健康促進學術機構的監修下，將飲食・運動・心理照護・認知功能維護等對今後生活有益的內容，以各主題的課程深入淺出地學習。",
      "modal.field1.p2": "此外，透過各項測量，可確認目前的身體狀態以及今後需留意的重點。了解夫妻各自的狀態，便能成為一同重新檢視今後生活習慣的契機。",
      "modal.field1.habits_subtitle": "在健康園區學習",
      "modal.field1.habits_title": '四大<span class="text-gold">健康習慣</span>',
      "modal.field1.card1_title": "飲食生活",
      "modal.field1.card1_desc": "重新檢視每日飲食均衡，學習能輕鬆持續的飲食習慣。",
      "modal.field1.card2_title": "運動",
      "modal.field1.card2_desc": "配合自身體能，養成日常的運動習慣。",
      "modal.field1.card3_title": "心理健康",
      "modal.field1.card3_desc": "學習面對壓力的方法，以及維持心理健康的自我照護。",
      "modal.field1.card4_title": "失智症預防",
      "modal.field1.card4_desc": "深入淺出地學習動腦的習慣，以及維持認知功能的對策。",

      /* ---- Modal: Field 2 (測) ---- */
      "modal.field2.title": "以十五種最新儀器<br>進行健康自我檢測",
      "modal.field2.p1": "測量包含八項基本測量（自助）以及由工作人員或具護理師資格者進行的七項測量。",
      "modal.field2.p2": "每項測量最長僅需約3〜5分鐘，對身體的負擔極小，且不會伴隨任何疼痛。",
      "modal.field2.p3": "為了讓您能放鬆地接受測量，敬請穿著寬鬆舒適、無束縛感的衣著前來。",
      "modal.field2.p4": "工作人員將全程陪伴並提供協助，讓您安心接受測量。",
      "modal.field2.supervisor_text": "【健康展館】是<br>在日本健康促進學術機構<br>監修下打造的健康設施。<br>首要目的並非發現疾病，<br>而是讓您了解自身的身體狀態。",
      "modal.field2.supervisor_title": "日本健康促進學術機構 理事長<br>治未病平衡會研究所 所長<br>治未病綜合醫院 院長<br>醫學博士 精神科醫師",
      "modal.field2.card1_title": "身體成分分析",
      "modal.field2.card1_desc": "測量肌肉、體脂肪、水分平衡",
      "modal.field2.card2_title": "血管年齡",
      "modal.field2.card2_desc": "評估血管的硬度與阻塞程度",
      "modal.field2.card3_title": "腦年齡",
      "modal.field2.card3_desc": "多角度檢測認知功能",
      "modal.field2.card4_title": "骨密度",
      "modal.field2.card4_desc": "測量骨骼強度，預防骨質疏鬆",
      "modal.field2.visible_title": '將身體成分分析、血管狀態、腦年齡等<br>身體健康狀態加以<span class="text-gold">可視化</span>',
      "modal.field2.visible_p1": "透過將健康狀態可視化，掌握自身的健康狀況，需要改善的重點也將一目了然。",
      "modal.field2.visible_p2": "「何處良好」「何處衰退」",
      "modal.field2.visible_p3": "希望您能依據此處的結果，重新檢視飲食・運動與生活習慣，進而連結至日常的生活改善。",

      /* ---- Modal: Field 3 (動) ---- */
      "modal.field3.title": "依自身體能<br>進行有效的運動體驗",
      "modal.field3.p1": "「健康訓練館」是能親身體驗在健康園區所學「運動」的場所。<br>是由日本健康促進學術機構監修的全天候型運動設施。",
      "modal.field3.p2": "在十七種設施中實際活動身體，可體驗符合自身身體狀況與體能的「運動」。",
      "modal.field3.p3": "透過活動身體，從平日的壓力與運動不足中獲得解放。<br>此外，為了讓您回家後也能輕鬆融入日常的健康習慣，亦清楚標示了作為參考的運動時間與消耗熱量，一目了然。",
      "modal.field3.exercise_title": '各裝置皆標示<span class="text-gold">運動效果</span>與<br class="u-pc">所使用的<span class="text-gold">主要肌肉</span>',
      "modal.field3.exercise_subtitle": "以 Dynamo Spin 為例",
      "modal.field3.exercise_text": "運動要點、禁止事項、運動使用的主要肌肉，以及運動效果的雷達圖等資訊，皆以日文與英文標示，並於每台儀器旁完整呈現。",
      "modal.field3.trainer_title": "日本健康促進學術機構 會員<br>慶星體育大學 講師<br>（體育人文・應用社會學系）<br>體育運動學 博士<br>健康運動指導士",

      /* ---- Modal: Field 5 (癒) ---- */
      "modal.field5.title": "遼闊景緻帶來的解放感與<br>於大自然環抱中療癒身心的溫浴",
      "modal.field5.card1_title": "阿蘇健康火山溫泉",
      "modal.field5.card1_desc": "富含天然三重礦物質的硫酸鹽溫泉。<br>在大自然石庭露天浴池中，撫慰平日的疲憊，促進消除疲勞與釋放壓力。",
      "modal.field5.card2_title": "健康溫熱窯十三種",
      "modal.field5.card2_desc": "備有可體感藥草與礦石功效的十三種圓頂窯，是日本最大級的健康溫浴設施。<br>在療癒的溫熱空間中，享受安寧、放鬆並調理身心的片刻時光。",
      "modal.field5.card3_title": "親親動物王國",
      "modal.field5.card3_subtitle": "動物療法設施",
      "modal.field5.card3_desc": "在這大自然阿蘇的山麓，藉由與自在生活的動物們親密接觸，感受自然的雄偉與生命的可貴，讓心靈沉澱、全身放鬆的動物療法設施。<br>能讓您度過一段心靈獲得療癒、不可思議地湧現活力的時光。",

      /* ---- Modal: Field 4 (食) ---- */
      "modal.field4.title": "為身體著想的阿蘇健康食",
      "modal.field4.card1_badge": "富含藥效成分",
      "modal.field4.card1_title": "活用菇類之力的「藥膳料理」",
      "modal.field4.card2_badge": "採用無農藥自家栽培蔬菜",
      "modal.field4.card2_title": "學術機構營養管理師精心設計的<br>健康菜單",
      "modal.field4.supervisor_heading": "“生活即是飲食”",
      "modal.field4.supervisor_p1": "於大阪大學・醫學部附屬醫院任職後，<br>約六十年間投身臨床、治療飲食與教育。",
      "modal.field4.supervisor_p2": "以「防患疾病於未然，打造強健身體與心理健康」為理念，<br>持續探究提升免疫力的重要性。",
      "modal.field4.supervisor_title": "日本健康促進學術機構 會員<br>臨床營養管理師<br>大阪健康女子大學畢業",

      /* ---- Modal: Field 6 (宿) ---- */
      "modal.field6.title": "體驗胎內空間<br>誘引安寧與舒適，邁向優質睡眠",
      "modal.field6.subtitle": '在森林中的住宿設施<span class="text-gold">實感森林療法效果</span>',
      "modal.field6.p1": "據說森林擁有溫柔調理人們身心的力量。",
      "modal.field6.p2": "眺望樹木的翠綠。深深吸入森林的芬芳。<br>觸摸樹皮，靜心聆聽小鳥的啁啾與小溪的潺潺水聲。",
      "modal.field6.p3": "透過五感感受自然的時光，能化解日常的緊張，<br>引領身心進入放鬆的狀態。",
      "modal.field6.p4": "源自森林的香氣與自然環境的刺激，能促進生理上的放鬆，<br>據信亦有助於維持與提升免疫機能。",
      "modal.field6.p5": "在自然中深度休憩，<br>從防患疾病於未然的「預防醫學」觀點來看，也備受矚目。",
      "modal.field6.profile_title": "日本健康促進學術機構 理事<br>九州大學 農學研究院<br>森林圈環境資源科學<br>副教授 農學博士",
      "modal.field6.detail_tag": "大自然阿蘇健康之森",
      "modal.field6.detail_title": "私人皇家專區",
      "modal.field6.detail_p1": "全客房皆設有門扉與庭園，共74間。<br>寬敞配置的「獨棟」式客房距離櫃台亦近，提供顧及行走便利、更上一層樓的休憩體驗。",
      "modal.field6.detail_p2": "以白色為基調的圓頂式客房，讓人彷彿踏入某處異國之地。<br>在大自然孕育的恩澤中，體感非日常的時光。",

      /* ---- Modal: Privacy ---- */
      "modal.privacy.title": "- 個人資料保護方針 -",
      "modal.privacy.intro": "阿蘇FARM LAND股份有限公司（以下簡稱本公司）認知到，保護個人資料不僅是社會責任，更是取得社會信賴、推動企業活動不可或缺的要件。本公司將充分顧及顧客個人資料的妥善管理與運用，並實施以下各項措施。",
      "modal.privacy.item1_title": '<span class="privacy-modal__item-icon"></span>個人資料的管理',
      "modal.privacy.item1_text": "本公司將充分顧及顧客個人資料的妥善管理與運用，並實施以下各項措施。",
      "modal.privacy.item2_title": '<span class="privacy-modal__item-icon"></span>使用目的與蒐集範圍',
      "modal.privacy.item2_text": "本公司於請顧客提供姓名・地址・電話號碼・電子郵件地址等個人資料時，將事先告知使用目的及洽詢窗口等資訊，並於適切範圍內蒐集顧客的個人資料。",
      "modal.privacy.item3_title": '<span class="privacy-modal__item-icon"></span>個人資料的使用',
      "modal.privacy.item3_text": "向顧客蒐集個人資料時，本公司將明確告知其目的，並基於下列目的加以運用。<br />為回覆顧客的洽詢。<br />・為受理商品訂購及相關聯絡。<br />・為配送商品及相關聯絡。<br />・為提供維護服務。<br />・為寄送介紹商品或服務的直接郵件與電子郵件。<br />・為本公司集團的行銷及服務提升、商品開發之統計調查。<br />・為向顧客傳達各項活動等通知。<br />・為登錄集點卡等會員服務。",
      "modal.privacy.item4_title": '<span class="privacy-modal__item-icon"></span>禁止向第三方提供・揭露',
      "modal.privacy.item4_text": "除已取得顧客同意，或依法令被要求揭露等具正當理由的情況外，本公司不會將顧客的個人資料提供・揭露予第三方。",
      "modal.privacy.item5_title": '<span class="privacy-modal__item-icon"></span>業務委託對象的監督',
      "modal.privacy.item5_text": "為達成顧客所同意的使用目的，本公司向業務委託對象揭露顧客個人資料時，將透過契約要求其以與本公司相同的水準徹底嚴格管理個人資料並確實執行，進行妥善的監督。",
      "modal.privacy.item6_title": '<span class="privacy-modal__item-icon"></span>資訊安全的確保・提升',
      "modal.privacy.item6_text": "為防止顧客個人資料的外洩・遺失・竄改等情事，本公司將持續致力於確保並提升資訊安全。",
      "modal.privacy.item7_title": '<span class="privacy-modal__item-icon"></span>教育・宣導',
      "modal.privacy.item7_text": "本公司將對所有董監事及員工進行教育與宣導，使其理解個人資料保護的重要性，並妥善處理顧客的個人資料。",
      "modal.privacy.item8_title": '<span class="privacy-modal__item-icon"></span>個人資料的揭露・更正等之因應',
      "modal.privacy.item8_text": "除下列任一情況外，本公司對於向顧客蒐集的個人資料，一概不向第三方提供・揭露等。<br />・依法令等被要求揭露時。<br />・針對顧客的洽詢，本公司判斷由協力廠商直接回覆較為適當時。<br />・於採取妥善保護措施後，向本公司協力廠商提供・共同利用時。<br />・已取得顧客事前同意時。<br />・為防止顧客及一般民眾的生命、健康、財產等發生重大損害而有必要時。<br />・公家機關依法律賦予之權限提出揭露請求時。<br />當顧客希望揭露或更正自身個人資料時，本公司將於確認提出申請者確為本人後，在合理的期間與範圍內予以因應。",
      "modal.privacy.item9_title": '<span class="privacy-modal__item-icon"></span>持續的檢討與改善',
      "modal.privacy.item9_text": "本公司在遵守個人資料保護相關法令及其他規範的同時，亦將因應社會環境的變化，持續檢討並改善個人資料保護的各項作為。"
    },

    ko: {
      /* ---- Header / nav ---- */
      "nav.program": "건강 프로그램 상세",
      "nav.pricing": "숙박 플랜과 요금",
      "nav.access": "오시는 길",
      "nav.faq": "자주 묻는 질문",
      "header.contact": "문의하기",
      "header.reserve": "지금 예약하기",

      /* ---- Drawer (SP) ---- */
      "drawer.program": "체류형 건강증진 프로그램이란",
      "drawer.supervision": "일본건강증진학술기구의 종합 감수",
      "drawer.fields": "건강 프로그램을 구성하는 6가지 분야",
      "drawer.wishes": "가족을 향한 마음",
      "drawer.pricing": "숙박 플랜과 요금",
      "drawer.access": "오시는 길",
      "drawer.faq": "자주 묻는 질문",
      "drawer.reserve": "지금 예약하기",
      "drawer.contact": "문의・상담은 이쪽으로",

      /* ---- Hero ---- */
      "hero.title": '<span class="hero__title-top">세계 최고 수준<span class="hero__title-of">의</span></span><span class="hero__title-main">종합 예방의료 시설</span>',
      "hero.tag": "은퇴 후의 새로운 건강 습관",
      "hero.reserve_tag": "체류형 건강증진 프로그램",
      "hero.reserve_label": '지금 예약하기<span class="hero__reserve-arrow" aria-hidden="true">›</span>',

      /* ---- Program ---- */
      "program.title": "체류형 건강증진 프로그램이란",
      "program.p1": '본 프로그램은<br class="u-sp" />60세 전후로 은퇴하시는 분들을 중심으로 한<br class="u-pc" />은퇴자를 위한 체류형 건강증진 프로그램입니다.',
      "program.p2": '인생의 전환기에 「건강을 재정의하고 습관화하는」 것을 목적으로,<br class="u-pc" />과학적 근거(에비던스)에 기반한 실천형 학습과 체험을 제공합니다.',
      "program.p3": '단순한 건강 시설이 아니라, 후회 없는 인생 2막을 실현하기 위한<br class="u-pc" />「건강의 등용문」으로서, 부부가 함께 참여하며<br />앞으로의 인생을 자립하여 걸어가기 위한 토대를 쌓습니다.',
      "program.p4": '소중한 가족을 위해서도, 언제까지나 건강하게 지내기 위해.<br class="u-pc" />그리고 풍요로운 노후를 위해, 건강 수명을 늘리는 것을 목표로 합니다.',

      /* ---- Supervision ---- */
      "supervision.subtitle": "일반사단법인",
      "supervision.title": "일본건강증진학술기구의 종합 감수",
      "supervision.desc1": '본 체류형 건강증진 프로그램에서는 프로그램식・의료・예방・자연의 힘을 융합하여,<br class="u-pc" />전문가들이 도달한 유일무이한 건강 체험을 제공합니다.',
      "supervision.desc2": "당신의 미래 건강을 진심으로 생각하는, 그 해답이 여기에 있습니다.",
      "supervision.member1_title": "일본건강증진학술기구 이사<br />(일반재단)박지회 노인병연구소 소장<br />의학박사",
      "supervision.member2_title": "초대 후생노동대신(전)<br />도쿄의과대학 의학부<br />특임교수 의학박사",
      "supervision.member3_title": "일본건강증진학술기구 이사장<br />치미병의학종합연구소 소장<br />치미병종합치료원 원장<br />의학박사 정신대화사",
      "supervision.member4_title": "일본건강증진학술기구 이사<br />규슈대학 대학원 농학연구원<br />삼림권 환경자원과학 부교수<br />농학박사",
      "supervision.member5_title": "(재)「벤노 장내플로라 연구소」이사장<br />국립연구개발법인 이화학연구소<br />명예연구원 농학박사",
      "supervision.member6_title": "일본건강증진학술기구 멤버<br />주식회사 유저라이프사이언스<br />이사회 회장 농학박사",
      "supervision.member7_title": "일본건강증진학술기구 멤버<br />마쓰무라 개고양이병원<br />수의사",
      "supervision.member8_title": "일본건강증진학술기구 멤버<br />요코하마시립대학 장수과학연구실<br />특임조교 이학박사",
      "supervision.notice": "※일부 전문가만 소개해 드리고 있습니다.",

      /* ---- Fields ---- */
      "fields.badge": "건강 프로그램 상세",
      "fields.title": '건강 프로그램을 구성하는<br /><span>6가지 분야</span>',
      "fields.desc1": '본 프로그램은 「학・측・동・식・치유・숙」 6가지 분야를 축으로 구성된,<br class="u-pc" />체류형 종합 예방의료 웰니스 프로그램입니다.',
      "fields.desc2": "120명 전문가의 지견과 아소의 웅대한 자연환경이 융합된, 유일무이한 건강 체험을 제공합니다.",
      "fields.card1_line1": "부부가 함께 배우고,",
      "fields.card1_line2": "자신의 몸을 안다",
      "fields.card2_line1": "15종류의 최신 기기로",
      "fields.card2_line2": "건강 셀프 체크",
      "fields.card3_line1": "자신의 체력에 맞춘",
      "fields.card3_line2": "효과적인 운동 체험",
      "fields.card4_line1": "무농약",
      "fields.card4_line2": "자사 재배 채소 사용",
      "fields.card5_line1": "100만㎡의 시설과",
      "fields.card5_line2": "대자연에 둘러싸인 온욕 체험.",
      "fields.card6_line1": "태내 공간이",
      "fields.card6_line2": "안식과 양질의 수면으로",
      "fields.more": "자세히 보기",

      /* ---- Wishes ---- */
      "wishes.title1": "가족을 향한 마음",
      "wishes.text1_p1": '본 건강 프로그램은 단순히 "건강해지기" 위한 서비스가 아닙니다.<br class="u-pc" />소중한 가족이나 파트너와<br class="u-pc" />앞으로도 안심하고 풍요롭게 살아가기 위한<br class="u-pc" />「미래를 위한 대비」를 제공하는 체류형 웰니스 프로그램입니다.',
      "wishes.text1_p2": '건강하다는 것은 단지 자신 한 사람의 몸이 튼튼하다는<br class="u-pc" />것에 그치지 않습니다.<br class="u-pc" />그것은 당신을 둘러싼 「소중한 사람들」의 인생까지 지키고,<br />지탱하는 일로 이어집니다.',
      "wishes.card1_capsule": "자립",
      "wishes.card1_text": "가족에게<br />부담을 주지 않기",
      "wishes.card2_capsule": "예방",
      "wishes.card2_text": "의료비 절감",
      "wishes.card3_capsule": "안심",
      "wishes.card3_text": "정신적,<br />경제적인 안심",
      "wishes.note": "「소중한 가족・파트너」를 위해서도,<br />언제까지나 건강하게 지내는 것은 사회적으로도 큰 가치를 지닙니다.",
      "wishes.sticky_btn": "예방의료 숙박 플랜 보기",
      "wishes.title2": "건강은 평생의 동반자",
      "wishes.text2_p1": "앞으로도 계속 움직일 수 있는 몸과 웃음 가득한 매일을.<br />건강은 한 번 손에 넣었다고 끝나는 것이 아닙니다.",
      "wishes.text2_p2": "중요한 것은 지금 자신의 상태를 「아는 것」.<br />그리고 무리하지 않는 범위에서 새로운 지혜를 「받아들이는 것」.",
      "wishes.text2_p3": "이러한 축적이 5년 후, 10년 후의 당신을 지탱하는<br />커다란 안심으로 바뀝니다.",

      /* ---- Pricing ---- */
      "pricing.title": "숙박 플랜과 요금",
      "pricing.desc": "체류를 통해 건강 습관을 몸에 익히는, 헬스 투어리즘 인증 취득 플랜입니다.<br />연속 체류로 강좌・측정・운동・온욕・식사・수면을 날마다 조합하여 체험하고,<br />습관화의 계기를 만드는 것을 목적으로 합니다.",
      "pricing.badge": "예방의료 숙박 플랜",
      "pricing.duration": "1인 5박 6일〜(2인 1실 이용 시)",
      "pricing.unit": "엔",
      "pricing.tax": "(세금 포함)",
      "pricing.plan_desc": "부부 각자의 페이스로 장시간 체류함으로써, 건강한 생활 습관을 더욱 깊이 몸에 익히는 플랜입니다.",
      "pricing.inclusions_title": "요금에 포함되는 내용",
      "pricing.incl1": "숙박",
      "pricing.incl2": "전문가 지정 건강 식사(1일 3식)",
      "pricing.incl3": "각종 시설 이용료",
      "pricing.incl4": "건강 강좌・측정・운동・온천 등 프로그램 체험",
      "pricing.option_title": "옵션",
      "pricing.option_name": "컨시어지 서비스",
      "pricing.option_label": "1일당",
      "pricing.option_currency": "엔",

      /* ---- Common ---- */
      "common.reserve_now": "지금 예약하기",
      "common.close": "닫기",

      /* ---- Contact modal ---- */
      "contact.name_label": '성함 <span class="text-danger">*</span>',
      "contact.name_placeholder": "예: 아소 타로",
      "contact.email_label": '이메일 주소 <span class="text-danger">*</span>',
      "contact.tel_label": '전화번호 <span class="text-danger">*</span>',
      "contact.subject_label": '문의 내용 종류 <span class="text-danger">*</span>',
      "contact.subject_opt1": "5박 6일 플랜 가예약",
      "contact.subject_opt2": "상담・기타 문의",
      "contact.message_label": "질문・요청 사항",
      "contact.message_placeholder": "식사 제한이나 알레르기, 픽업 관련 상담 등은 이곳에 기입해 주세요.",
      "contact.policy_text": '입력하신 정보는 당사의 개인정보 처리방침에 따라 엄중히 관리합니다.<br />당사의 <a href="#" class="js-privacy-trigger contact-modal__policy-link">개인정보 처리방침</a>을 확인하시고 동의하신 후 전송해 주세요.',
      "contact.agree": '동의합니다<span class="text-danger">*</span>',
      "contact.submit": "전송하기",

      /* ---- Schedule ---- */
      "schedule.capsule": "부부 이용 예시",
      "schedule.title": "5박 6일 모델 스케줄",
      "schedule.day1_title": "건강 상태를 아는 시작",
      "schedule.day1_text": "체크인 후에는 오리엔테이션과 신체 상태 측정으로 체력 연령을 확인합니다. 온천과 저녁 식사로 첫날의 몸을 천천히 가다듬습니다.",
      "schedule.day2_title": "배움과 요가로 가다듬는 날",
      "schedule.day2_text": "아침 식사 후에는 건강 지식을 배우고 자유 시간을. 점심과 요가, 온천으로 심신을 무리 없이 가다듬습니다.",
      "schedule.day3_title": "운동과 온열로 가다듬는 날",
      "schedule.day3_text": "건강 트레이닝관에서 체력에 맞춘 운동을. 점심 후에는 온열 가마와 온천을 즐기며 자유 시간에 휴식을 취합니다.",
      "schedule.day4_title": "아소의 명소를 둘러보는 하루",
      "schedule.day4_text": "아침 식사 후에는 기쿠치 계곡과 다이칸보 등 아소 주변 관광지를 둘러보고, 온천과 저녁 식사로 여행의 피로를 천천히 풀어 줍니다.",
      "schedule.day5_title": "부부가 자유롭게 보내는 날",
      "schedule.day5_text": "이른 아침은 자유 시간으로 시작됩니다. 아침 식사 후에는 돔 환원욕과 관광, 점심을 즐기고, 온천과 저녁 식사로 평온하게 보냅니다.",
      "schedule.day6_title": "변화를 확인하고 여정을 마무리하는 날",
      "schedule.day6_text": "아침 식사 후에는 체크아웃하고 최종 측정을 합니다. 건강 캠퍼스에서의 체류를 돌아보며, 출발까지 자유 시간을 즐길 수 있습니다.",
      "schedule.cta": "스케줄 상세 보기",

      /* ---- Schedule detail modal (5泊6日) ---- */
      "smodal.title": '건강 프로그램 <span>(5박 6일)</span><br />상세 스케줄',
      "smodal.note": "※화면을 확대하여 확인해 주세요",
      "smodal.checkin": "체크인",
      "smodal.pavilion_measure": '건강 파빌리온<br />(측정)',
      "smodal.fitness_age": "체력 연령 측정",
      "smodal.onsen": "온천",
      "smodal.dinner": "저녁 식사",
      "smodal.sleep": "수면",
      "smodal.breakfast": "아침 식사",
      "smodal.campus": '건강<br />캠퍼스',
      "smodal.freetime_walk": '자유 시간<br />(산책 등)',
      "smodal.lunch_buffet": '점심<br />뷔페',
      "smodal.yoga": "요가",
      "smodal.training": '건강<br />트레이닝관',
      "smodal.thermal": '온열동<br />13종',
      "smodal.freetime": "자유 시간",
      "smodal.day_tour": "1일 관광",
      "smodal.spot_daikanbo": "・다이칸보",
      "smodal.spot_shirakawa": "・시라카와 수원",
      "smodal.spot_myojin": "・묘진이케 명수공원",
      "smodal.spot_kikuchi": "・기쿠치 계곡",
      "smodal.couple_walk": "부부 이른 아침 산책",
      "smodal.dome_bath": "돔 환원욕",
      "smodal.kinokotei_lunch": "기노코테이 점심",
      "smodal.local_tour": "현지 관광",
      "smodal.local_tour_sub": '가미시키미<br />구마노이마스 신사',
      "smodal.checkout": "체크아웃",
      "smodal.pavilion_final": '건강 파빌리온<br />(최종 측정)',
      "smodal.campus_review": '건강 캠퍼스<br />(체류 돌아보기)',
      "smodal.freetime_departure": '자유 시간<br />・출발',

      /* ---- Access ---- */
      "access.title": "오시는 길",
      "access.intro": "아소의 웅대한 자연에 둘러싸인 특별한 로케이션이면서도,<br />주요 공항이나 역에서도 접근하기 쉬운 환경입니다.",
      "access.location_title": "소재지",
      "access.transit_title": "주요 교통수단으로 오시는 길",
      "access.airport_title": "공항에서 오시는 고객님",
      "access.airport_desc1": "구마모토 공항에서 차로 약 30분",
      "access.airport_desc2": "후쿠오카 공항에서 차로 약 135분",
      "access.train_title": "전철로 오시는 고객님",
      "access.train_desc1": "JR 아소역에서 택시로 약 20분",
      "access.train_desc2": "JR 아카미즈역에서 택시로 약 7분",
      "access.car_title": "자가용으로 오시는 고객님",
      "access.car_desc1": "구마모토 시내에서 차로 약 60분",
      "access.car_desc2": "후쿠오카 방면에서 고속도로 이용으로 접근 가능",
      "access.address": "구마모토현 아소군 미나미아소무라 가와요 5579-3",
      "access.btn_map": "Google 지도에서 보기",
      "access.btn_route": "경로 보기",

      /* ---- FAQ ---- */
      "faq.title": "자주 묻는 질문",
      "faq.q1": "최소 며칠부터 체류할 수 있나요?",
      "faq.a1": "본 프로그램은 5박 6일 이상의 체류를 권장하고 있습니다. 단기 체류가 아니라 식사・운동・온열・수면을 통해 생활 습관을 가다듬음으로써, 보다 깊은 건강 체험을 제공합니다.",
      "faq.q2": "부부가 함께 참가할 수 있나요?",
      "faq.a2": "네. 부부 동반 참가를 권장하고 있습니다. 서로의 건강 상태를 다시 살펴보면서, 앞으로의 인생을 보다 풍요롭게 보내기 위한 시간으로 이용하실 수 있습니다.",
      "faq.q3": "의료 행위나 치료를 하는 시설인가요?",
      "faq.a3": "본 프로그램은 질병 치료를 목적으로 하는 의료 시설이 아닙니다. 예방의료・웰니스・생활 습관 개선을 목적으로 한 체류형 건강증진 프로그램입니다.",
      "faq.q4": "운동을 잘 못해도 참가할 수 있나요?",
      "faq.a4": "물론 가능합니다. 연령이나 체력에 맞춰 무리 없이 임할 수 있는 프로그램을 준비하고 있습니다. 건강 측정을 바탕으로 자신에게 맞는 페이스로 참가하실 수 있습니다.",
      "faq.q5": "식사 제한이나 알레르기 대응이 가능한가요?",
      "faq.a5": "가능한 한 대응하고 있습니다. 알레르기나 식사 제한, 채식 대응 등에 대해서는 예약 시 미리 상담해 주시기 바랍니다.",
      "faq.q6": "영어로 응대가 가능한가요?",
      "faq.a6": "해외 고객님께서도 안심하고 체류하실 수 있도록 영어 응대를 순차적으로 정비하고 있습니다. 사전에 상담해 주시면 최대한 지원해 드리겠습니다.",
      "faq.q7": "요금에는 무엇이 포함되어 있나요?",
      "faq.a7": '숙박비, 지정 식사, 건강 시설 이용료가 포함되어 있습니다. 자세한 내용은 <a href="#pricing" class="faq__link">플랜 내용</a>을 확인해 주시기 바랍니다.',
      "faq.q8": "컨시어지 서비스가 있나요?",
      "faq.a8": "네. 보다 쾌적한 체류를 지원하는 컨시어지 서비스를 준비하고 있습니다. 이용을 희망하시는 경우, 예약 페이지에서 컨시어지 옵션을 선택해 주시기 바랍니다.",
      "faq.q9": "체류 전에 상담할 수 있나요?",
      "faq.a9": '네. 우려되는 점이나 건강 상태, 체류 목적 등에 대해 사전 상담을 받고 있습니다. <a href="#contact" class="faq__link faq__link--underline">문의는 이쪽으로</a>',

      /* ---- Footer ---- */
      "footer.cta_title": '병에 걸리기 전 단계부터 생활 습관을 다시 살펴보는<br /><span class="footer__cta-highlight">진정한 건강 만들기는 여기에서 시작됩니다.</span>',
      "footer.reserve": "지금 예약하기",
      "footer.contact": "문의・상담은 이쪽으로",
      "footer.hours": "연중무휴／예약 접수 시간 9:00〜17:00",
      "footer.nav_program": "체류형 건강증진 프로그램이란",
      "footer.nav_supervision": "일본건강증진학술기구의 종합 감수",
      "footer.nav_fields": "건강 프로그램을 구성하는 6가지 분야",
      "footer.nav_wishes": "가족을 향한 마음",
      "footer.nav_pricing": "숙박 플랜과 요금",
      "footer.nav_access": "오시는 길",
      "footer.nav_faq": "자주 묻는 질문",
      "footer.nav_contact": "문의・상담",
      "footer.nav_privacy": "개인정보 처리방침",
      "footer.address": "〒869-1404 구마모토현 아소군 미나미아소무라 가와요 5579-3",

      /* ---- Modal: Field 1 (學) ---- */
      "modal.field1.title": "부부가 함께 배우고,<br>자신의 몸을 안다",
      "modal.field1.p1": "건강 만들기는 먼저 자신의 몸을 아는 것에서 시작됩니다.<br>일본건강증진학술기구의 감수 아래, 식사・운동・마음 케어・인지 기능에 대한 배려 등 앞으로의 생활에 도움이 되는 내용을 주제별 커리큘럼으로 알기 쉽게 배웁니다.",
      "modal.field1.p2": "또한 각종 측정을 통해 현재의 몸 상태와 앞으로 주의해야 할 포인트를 확인할 수 있습니다. 부부 각자의 상태를 앎으로써, 앞으로의 생활 습관을 함께 다시 살펴보는 계기가 됩니다.",
      "modal.field1.habits_subtitle": "건강 캠퍼스에서 배우는",
      "modal.field1.habits_title": '4가지 <span class="text-gold">건강 습관</span>',
      "modal.field1.card1_title": "식생활",
      "modal.field1.card1_desc": "매일의 식사 균형을 다시 살펴보고, 무리 없이 지속할 수 있는 식습관을 배웁니다.",
      "modal.field1.card2_title": "운동",
      "modal.field1.card2_desc": "자신의 체력에 맞춰 일상적인 운동 습관을 몸에 익힙니다.",
      "modal.field1.card3_title": "마음의 건강",
      "modal.field1.card3_desc": "스트레스를 마주하는 방법과 마음의 건강을 지키기 위한 셀프 케어를 배웁니다.",
      "modal.field1.card4_title": "치매 예방",
      "modal.field1.card4_desc": "뇌를 사용하는 습관과 인지 기능을 유지하기 위한 대책을 알기 쉽게 배웁니다.",

      /* ---- Modal: Field 2 (測) ---- */
      "modal.field2.title": "15종류의 최신 기기로<br>건강 셀프 체크",
      "modal.field2.p1": "측정에는 기본이 되는 8가지 측정(셀프)과 스태프 또는 간호사 자격자에 의한 7가지 측정이 있습니다.",
      "modal.field2.p2": "한 가지 측정은 길어도 3〜5분 정도 소요되며, 신체 부담도 적고 통증을 동반하는 측정은 없습니다.",
      "modal.field2.p3": "측정 시 편안하게 받으실 수 있도록, 조이지 않는 편한 복장으로 받으시기 바랍니다.",
      "modal.field2.p4": "안심하고 측정받으실 수 있도록 스태프가 곁에서 함께하며 지원해 드립니다.",
      "modal.field2.supervisor_text": "【건강 파빌리온】은<br>일본건강증진학술기구의<br>감수를 받아 만들어진 건강 시설입니다.<br>질병 발견이 아니라, 자신의 신체 상태를<br>알게 하는 것이 첫 번째 목적입니다.",
      "modal.field2.supervisor_title": "일본건강증진학술기구 이사장<br>치미병평형회연구소 소장<br>치미병종합병원 원장<br>의학박사 정신과 의사",
      "modal.field2.card1_title": "체성분 분석",
      "modal.field2.card1_desc": "근육, 체지방, 수분 밸런스를 측정",
      "modal.field2.card2_title": "혈관 연령",
      "modal.field2.card2_desc": "혈관의 경직도와 막힘 정도를 평가",
      "modal.field2.card3_title": "뇌 연령",
      "modal.field2.card3_desc": "인지 기능을 다각도로 체크",
      "modal.field2.card4_title": "골밀도",
      "modal.field2.card4_desc": "뼈의 강도를 측정하여 골다공증 예방",
      "modal.field2.visible_title": '체성분 분석, 혈관 상태, 뇌 연령 등<br>몸의 건강 상태를 <span class="text-gold">가시화</span>',
      "modal.field2.visible_p1": "건강 상태를 가시화함으로써 자신의 건강 상태를 파악하고, 개선해야 할 포인트가 보이기 시작합니다.",
      "modal.field2.visible_p2": "「무엇이 좋은지」「어디가 쇠약해졌는지」",
      "modal.field2.visible_p3": "이곳에서의 결과를 바탕으로 식사・운동과 생활 습관을 다시 살펴보고, 매일의 생활 개선으로 이어 가시길 바랍니다.",

      /* ---- Modal: Field 3 (動) ---- */
      "modal.field3.title": "자신의 체력에 맞춘<br>효과적인 운동 체험",
      "modal.field3.p1": "「건강 트레이닝관」은 건강 캠퍼스에서 배운 「운동」을 직접 체험할 수 있는 장소입니다.<br>일본건강증진학술기구가 감수한 전천후형 운동 어트랙션 시설입니다.",
      "modal.field3.p2": "17종류의 어트랙션에서 실제로 몸을 움직여, 자신의 컨디션과 체력에 맞춘 「운동」을 체험할 수 있습니다.",
      "modal.field3.p3": "몸을 움직임으로써 평소의 스트레스와 운동 부족에서 해방됩니다.<br>또한 집으로 돌아간 후에도 일상의 건강 습관에 적용하기 쉽도록, 기준이 되는 운동 시간과 소비 칼로리도 한눈에 알기 쉽게 게시하고 있습니다.",
      "modal.field3.exercise_title": '각 장치에는 <span class="text-gold">운동 효과</span>와<br class="u-pc">사용하는 <span class="text-gold">주요 근육</span>을 표시',
      "modal.field3.exercise_subtitle": "다이나모 스핀의 경우",
      "modal.field3.exercise_text": "운동의 포인트와 금지 사항, 운동에 사용하는 주요 근육, 운동 효과의 레이더 차트 등이 일본어와 영어로 적힌 것이 기기별로 모두 제시되어 있습니다.",
      "modal.field3.trainer_title": "일본건강증진학술기구 회원<br>경성체육대학 강사<br>(스포츠 인문・응용사회학계)<br>체육스포츠학 박사<br>건강운동지도사",

      /* ---- Modal: Field 5 (癒) ---- */
      "modal.field5.title": "광활한 경치가 자아내는 해방감과<br>대자연에 둘러싸여 심신을 치유하는 온욕",
      "modal.field5.card1_title": "아소 건강 화산 온천",
      "modal.field5.card1_desc": "천연 트리플 미네랄을 함유한 황산염 온천입니다.<br>대자연 석정 노천탕에서 평소의 피로를 풀고, 피로 회복과 스트레스 해소를 촉진합니다.",
      "modal.field5.card2_title": "건강 온열 가마 13종",
      "modal.field5.card2_desc": "약초와 광석의 효능을 체감할 수 있는 13종류의 돔 가마를 갖춘, 일본 최대급의 건강 온욕 시설입니다.<br>치유의 온열 공간 속에서 안식과 심신을 이완하고 가다듬는 한때를 보내실 수 있습니다.",
      "modal.field5.card3_title": "교감 동물 왕국",
      "modal.field5.card3_subtitle": "애니멀 테라피 시설",
      "modal.field5.card3_desc": "이곳 대자연 아소의 기슭에서 자유롭게 살아가는 동물들과 교감함으로써, 자연의 웅대함과 생명의 소중함을 느끼고, 마음도 차분해지며 온몸이 이완되는 애니멀 테라피 시설입니다.<br>마음이 치유되고 신기하게도 기운이 솟아나는, 그런 한때를 보내실 수 있습니다.",

      /* ---- Modal: Field 4 (食) ---- */
      "modal.field4.title": "몸을 생각하는 아소의 건강식",
      "modal.field4.card1_badge": "약효 성분을 풍부하게 함유",
      "modal.field4.card1_title": "버섯의 힘을 살린 「약선 요리」",
      "modal.field4.card2_badge": "무농약 자사 재배 채소 사용",
      "modal.field4.card2_title": "학술기구의 영양관리사가 고안한<br>건강 메뉴",
      "modal.field4.supervisor_heading": "“산다는 것은 먹는 것”",
      "modal.field4.supervisor_p1": "오사카대학・의학부 부속병원에서 근무한 후,<br>약 60년간 임상과 치료식, 교육에 종사.",
      "modal.field4.supervisor_p2": "「질병을 미연에 방지하고, 강한 신체와 마음의 건강 만들기」를 콘셉트로<br>면역력을 높이는 중요성을 탐구하고 있다.",
      "modal.field4.supervisor_title": "일본건강증진학술기구 회원<br>임상영양관리사<br>오사카건강여자대학 졸업",

      /* ---- Modal: Field 6 (宿) ---- */
      "modal.field6.title": "체험 태내 공간이<br>안식과 편안함을 자아내어 양질의 수면으로",
      "modal.field6.subtitle": '숲속의 숙박 시설에서 <span class="text-gold">삼림 테라피 효과</span>를 실감',
      "modal.field6.p1": "숲에는 사람의 마음과 몸을 부드럽게 가다듬는 힘이 있다고 합니다.",
      "modal.field6.p2": "나무들의 초록을 바라보는 것. 숲의 향기를 깊이 들이마시는 것.<br>나무 표면을 만지고, 새들의 지저귐과 시냇물의 졸졸거림에 귀 기울이는 것.",
      "modal.field6.p3": "오감을 통해 자연을 느끼는 시간이 일상의 긴장을 풀어 주고,<br>심신을 이완된 상태로 이끕니다.",
      "modal.field6.p4": "숲에서 유래한 향기와 자연환경에 의한 자극은 생리적인 이완을 촉진하여,<br>면역 기능의 유지・향상으로도 이어진다고 여겨집니다.",
      "modal.field6.p5": "자연 속에서 깊이 쉬는 것은,<br>질병을 미연에 방지하는 「예방의학」의 관점에서도 주목받고 있습니다.",
      "modal.field6.profile_title": "일본건강증진학술기구 이사<br>규슈대학 농학연구원<br>삼림권 환경자원과학<br>부교수 농학박사",
      "modal.field6.detail_tag": "대자연 아소 건강의 숲",
      "modal.field6.detail_title": "프라이빗・로열 존",
      "modal.field6.detail_p1": "전 객실에 문과 정원을 갖춘 객실은 총 74실.<br>여유롭게 배치된 「별채」 타입의 객실은 프런트에서도 가까우며, 보행을 배려한 한 단계 높은 휴식을 보내실 수 있습니다.",
      "modal.field6.detail_p2": "흰색을 기조로 한 둥근 돔형 객실은, 어딘가 이국의 땅에 발을 들인 듯한 감각을 느끼게 합니다.<br>대자연이 빚어내는 은혜 속에서 비일상을 체감하실 수 있습니다.",

      /* ---- Modal: Privacy ---- */
      "modal.privacy.title": "- 개인정보 보호방침 -",
      "modal.privacy.intro": "주식회사 아소 팜랜드(이하 당사)는 개인정보를 보호하는 것이 사회적 책무임과 동시에, 사회의 신뢰를 얻어 기업 활동을 추진하기 위해 불가결한 요건이라고 인식하고 있습니다. 당사는 고객의 개인정보의 적절한 관리・이용에 충분히 배려하여, 다음의 노력을 실시합니다.",
      "modal.privacy.item1_title": '<span class="privacy-modal__item-icon"></span>개인정보의 관리',
      "modal.privacy.item1_text": "당사는 고객의 개인정보의 적절한 관리・이용에 충분히 배려하여, 다음의 노력을 실시합니다.",
      "modal.privacy.item2_title": '<span class="privacy-modal__item-icon"></span>이용 목적과 수집 범위',
      "modal.privacy.item2_text": "당사는 고객으로부터 성함・주소・전화번호・이메일 주소 등의 개인정보를 제공받는 경우에는, 미리 이용 목적이나 문의 창구 등을 알려 드리고, 적절한 범위 내에서 고객의 개인정보를 수집합니다.",
      "modal.privacy.item3_title": '<span class="privacy-modal__item-icon"></span>개인정보의 이용',
      "modal.privacy.item3_text": "고객으로부터 개인정보를 수집하는 경우에는, 그 목적을 명확히 알려 드리며, 다음에 열거하는 목적을 위해 이용합니다.<br />고객의 문의에 대한 답변을 위해.<br />・상품 주문 접수 및 그에 따른 연락을 위해.<br />・상품 배달 및 그에 따른 연락을 위해.<br />・보수 서비스 제공을 위해.<br />・상품이나 서비스를 안내하는 다이렉트 메일이나 이메일을 발송하기 위해.<br />・당사 그룹의 마케팅 및 서비스 향상, 상품 개발을 위한 통계 조사를 위해.<br />・각종 캠페인 등의 안내를 고객에게 전달하기 위해.<br />・포인트 카드 등 회원 서비스 등록을 위해.",
      "modal.privacy.item4_title": '<span class="privacy-modal__item-icon"></span>제3자 제공・공개의 금지',
      "modal.privacy.item4_text": "당사는 고객으로부터 동의를 받은 경우나 법령에 근거하여 공개를 청구받은 경우 등 정당한 사유가 있는 경우를 제외하고, 고객의 개인정보를 제3자에게 제공・공개하지 않습니다.",
      "modal.privacy.item5_title": '<span class="privacy-modal__item-icon"></span>업무 위탁처의 감독',
      "modal.privacy.item5_text": "당사는 고객으로부터 동의받은 이용 목적을 달성하기 위해, 당사가 업무 위탁처에 고객의 개인정보를 공개하는 경우에는, 당사와 동일한 수준으로 개인정보를 엄중히 관리하도록 계약으로 의무화하고 이를 실시하게 하는 등, 적절한 감독을 실시합니다.",
      "modal.privacy.item6_title": '<span class="privacy-modal__item-icon"></span>정보 보안의 확보・향상',
      "modal.privacy.item6_text": "당사는 고객의 개인정보의 누출・분실・변조 등을 방지하기 위해, 지속적으로 정보 보안의 확보・향상에 힘씁니다.",
      "modal.privacy.item7_title": '<span class="privacy-modal__item-icon"></span>교육・계발',
      "modal.privacy.item7_text": "당사는 모든 임원 및 직원에 대해, 개인정보 보호의 중요성을 이해하고 고객의 개인정보를 적절히 취급하도록 교육・계발을 실시합니다.",
      "modal.privacy.item8_title": '<span class="privacy-modal__item-icon"></span>개인정보의 공개・정정 등에 대한 대응',
      "modal.privacy.item8_text": "당사는 고객으로부터 수집한 개인정보를 다음 중 어느 하나에 해당하는 경우를 제외하고, 제3자에게 제공・공개 등을 일절 하지 않습니다.<br />・법령 등에 의해 공개가 요구된 경우.<br />・고객의 문의에 대해, 그 내용을 당사의 협력회사가 직접 답변하는 것이 적절하다고 당사가 판단한 경우.<br />・적절한 보호 조치를 강구한 후, 당사의 협력회사에 제공・공동 이용하는 경우.<br />・고객의 사전 동의를 얻은 경우.<br />・고객 및 일반 시민의 생명, 건강, 재산 등에 중대한 손해가 발생하는 것을 방지하기 위해 필요한 경우.<br />・공적 기관으로부터 법률에 근거한 권한에 의한 공개 청구가 있었던 경우.<br />당사는 고객이 자신의 개인정보의 공개나 정정 등을 희망하시는 경우, 신청하신 고객이 본인임을 확인한 후, 합리적인 기간 및 범위에서 대응합니다.",
      "modal.privacy.item9_title": '<span class="privacy-modal__item-icon"></span>지속적인 재검토와 개선',
      "modal.privacy.item9_text": "당사는 개인정보 보호에 관련된 법령, 기타 규범을 준수함과 동시에, 사회 환경의 변화에 따라 개인정보 보호의 노력을 지속적으로 재검토하고 개선합니다."
    },

    en: {
      /* ---- Header / nav ---- */
      "nav.program": "Program Details",
      "nav.pricing": "Plans &amp; Pricing",
      "nav.access": "Access",
      "nav.faq": "FAQ",
      "header.contact": "Contact Us",
      "header.reserve": "Book Now",

      /* ---- Drawer (SP) ---- */
      "drawer.program": "What Is the Stay-Type Health-Promotion Program",
      "drawer.supervision": "Fully Supervised by the Japan Health Promotion Academic Organization",
      "drawer.fields": "The Six Fields That Make Up the Program",
      "drawer.wishes": "Our Wishes for Your Family",
      "drawer.pricing": "Plans &amp; Pricing",
      "drawer.access": "Access",
      "drawer.faq": "FAQ",
      "drawer.reserve": "Book Now",
      "drawer.contact": "Inquiries &amp; Consultations Here",

      /* ---- Hero ---- */
      "hero.title": '<span class="hero__title-top">A World-Class<span class="hero__title-of"> </span></span><span class="hero__title-main">Comprehensive Preventive-Medicine Facility</span>',
      "hero.tag": "A New Health Habit for Life After Retirement",
      "hero.reserve_tag": "Stay-Type Health-Promotion Program",
      "hero.reserve_label": 'Book Now<span class="hero__reserve-arrow" aria-hidden="true">›</span>',

      /* ---- Program ---- */
      "program.title": "What Is the Stay-Type Health-Promotion Program",
      "program.p1": 'This program is<br class="u-sp" />a stay-type health-promotion program designed for retirees,<br class="u-pc" />centered on those approaching retirement around the age of sixty.',
      "program.p2": 'Aiming to “redefine health and make it a habit” at this turning point in life,<br class="u-pc" />it offers hands-on learning and experiences grounded in scientific evidence.',
      "program.p3": 'More than a mere health facility, it is a “gateway to health” for realizing a second life without regret.<br class="u-pc" />Taking part together as a couple,<br />you build a solid foundation for living the years ahead with independence.',
      "program.p4": 'For the sake of your beloved family, and to stay vibrant for years to come.<br class="u-pc" />And for a rich later life, we aim to extend your healthy life expectancy.',

      /* ---- Supervision ---- */
      "supervision.subtitle": "General Incorporated Association",
      "supervision.title": "Fully Supervised by the Japan Health Promotion Academic Organization",
      "supervision.desc1": 'In this stay-type health-promotion program, we blend a structured diet, medicine, prevention, and the power of nature<br class="u-pc" />to deliver a one-of-a-kind health experience refined by leading specialists.',
      "supervision.desc2": "The answer that truly cares about your future health is right here.",
      "supervision.member1_title": "Director, Japan Health Promotion Academic Organization<br />Director, Hakujikai Institute of Gerontology<br />M.D., Ph.D.",
      "supervision.member2_title": "First Minister of Health, Labour and Welfare (former)<br />Tokyo Medical University, Faculty of Medicine<br />Specially Appointed Professor, M.D., Ph.D.",
      "supervision.member3_title": "Chairman, Japan Health Promotion Academic Organization<br />Director, Comprehensive Research Institute of Preventive Medicine<br />Director, Preventive Medicine Comprehensive Clinic<br />M.D., Ph.D., Counselor",
      "supervision.member4_title": "Director, Japan Health Promotion Academic Organization<br />Graduate School of Agriculture, Kyushu University<br />Associate Professor, Forest Environmental Resources Science<br />Ph.D. in Agriculture",
      "supervision.member5_title": "Chairman, Benno Institute for Intestinal Microbiota Research<br />RIKEN (National Research and Development Agency)<br />Honorary Researcher, Ph.D. in Agriculture",
      "supervision.member6_title": "Member, Japan Health Promotion Academic Organization<br />User Life Science Co., Ltd.<br />Chairman, Ph.D. in Agriculture",
      "supervision.member7_title": "Member, Japan Health Promotion Academic Organization<br />Matsumura Dog &amp; Cat Hospital<br />Veterinarian",
      "supervision.member8_title": "Member, Japan Health Promotion Academic Organization<br />Longevity Science Laboratory, Yokohama City University<br />Specially Appointed Assistant Professor, Ph.D. in Science",
      "supervision.notice": "※Only a selection of specialists is introduced here.",

      /* ---- Fields ---- */
      "fields.badge": "Program Details",
      "fields.title": 'The Six Fields That Make Up<br /><span>the Health Program</span>',
      "fields.desc1": 'This program is built around six fields — Learn, Measure, Move, Eat, Heal, and Stay —<br class="u-pc" />a stay-type comprehensive preventive-medicine wellness program.',
      "fields.desc2": "Blending the insight of 120 specialists with the majestic natural environment of Aso, we offer a one-of-a-kind health experience.",
      "fields.card1_line1": "Learn together as a couple",
      "fields.card1_line2": "and understand your own body",
      "fields.card2_line1": "A health self-check with",
      "fields.card2_line2": "15 of the latest devices",
      "fields.card3_line1": "Effective exercise tailored",
      "fields.card3_line2": "to your own fitness level",
      "fields.card4_line1": "Made with pesticide-free,",
      "fields.card4_line2": "home-grown vegetables",
      "fields.card5_line1": "A bathing experience within a 1,000,000 m² site,",
      "fields.card5_line2": "embraced by great nature.",
      "fields.card6_line1": "A womb-like space brings",
      "fields.card6_line2": "rest and quality sleep",
      "fields.more": "View details",

      /* ---- Wishes ---- */
      "wishes.title1": "Our Wishes for Your Family",
      "wishes.text1_p1": 'This health program is not merely a service for “getting healthier.”<br class="u-pc" />It is a stay-type wellness program offering<br class="u-pc" />“preparation for the future,” so that you and your beloved family or partner<br class="u-pc" />can go on living with peace of mind and abundance.',
      "wishes.text1_p2": 'Being healthy is not only about<br class="u-pc" />one person’s body being strong.<br class="u-pc" />It is deeply connected to protecting and supporting the lives of the<br />“important people” around you.',
      "wishes.card1_capsule": "Independence",
      "wishes.card1_text": "Not placing a burden<br />on your family",
      "wishes.card2_capsule": "Prevention",
      "wishes.card2_text": "Curbing medical costs",
      "wishes.card3_capsule": "Peace of Mind",
      "wishes.card3_text": "Peace of mind,<br />emotionally and financially",
      "wishes.note": "Staying healthy for years to come, for the sake of your “beloved family and partner,”<br />holds great value for society as well.",
      "wishes.sticky_btn": "View the Preventive-Medicine Stay Plan",
      "wishes.title2": "Health Is a Lifelong Companion",
      "wishes.text2_p1": "May you keep a body that moves freely and days full of smiles in the years ahead.<br />Health is not something you secure once and then forget.",
      "wishes.text2_p2": "What matters is to “know” your current condition.<br />And to “take in” new knowledge, within reasonable limits.",
      "wishes.text2_p3": "This steady accumulation becomes great peace of mind<br />that supports the you of five and ten years from now.",

      /* ---- Pricing ---- */
      "pricing.title": "Plans &amp; Pricing",
      "pricing.desc": "This is a Health Tourism–certified plan for building healthy habits through your stay.<br />Over consecutive nights, each day combines hands-on lectures, measurements, exercise, bathing, meals, and sleep,<br />aiming to create the spark for lasting habits.",
      "pricing.badge": "Preventive-Medicine Stay Plan",
      "pricing.duration": "From 5 nights / 6 days per person (double occupancy)",
      "pricing.unit": "JPY",
      "pricing.tax": "(tax incl.)",
      "pricing.plan_desc": "A plan for couples to build healthy lifestyle habits even more deeply, each at their own pace, through an extended stay.",
      "pricing.inclusions_title": "What the Price Includes",
      "pricing.incl1": "Accommodation",
      "pricing.incl2": "Specialist-designed healthy meals (three meals daily)",
      "pricing.incl3": "Use of the various facilities",
      "pricing.incl4": "Program experiences: health lectures, measurements, exercise, hot springs, and more",
      "pricing.option_title": "Optional Add-On",
      "pricing.option_name": "Concierge Service",
      "pricing.option_label": "Per day",
      "pricing.option_currency": "JPY",

      /* ---- Common ---- */
      "common.reserve_now": "Book Now",
      "common.close": "Close",

      /* ---- Contact modal ---- */
      "contact.name_label": 'Name <span class="text-danger">*</span>',
      "contact.name_placeholder": "e.g. Taro Aso",
      "contact.email_label": 'Email Address <span class="text-danger">*</span>',
      "contact.tel_label": 'Phone Number <span class="text-danger">*</span>',
      "contact.subject_label": 'Type of Inquiry <span class="text-danger">*</span>',
      "contact.subject_opt1": "Tentative booking for the 5-night / 6-day plan",
      "contact.subject_opt2": "Consultation / Other inquiries",
      "contact.message_label": "Questions / Requests",
      "contact.message_placeholder": "Please enter here any consultations regarding dietary restrictions, allergies, pick-up service, and the like.",
      "contact.policy_text": 'The information you enter will be strictly managed in accordance with our Privacy Policy.<br />Please review our <a href="#" class="js-privacy-trigger contact-modal__policy-link">Privacy Policy</a> and submit only after agreeing to it.',
      "contact.agree": 'I agree<span class="text-danger">*</span>',
      "contact.submit": "Submit",

      /* ---- Schedule ---- */
      "schedule.capsule": "Example for Couples",
      "schedule.title": "A 5-Night, 6-Day Model Schedule",
      "schedule.day1_title": "The Starting Point: Knowing Your Health",
      "schedule.day1_text": "After check-in, an orientation and body-condition measurements reveal your fitness age. Ease your body into the first day with a hot spring and dinner.",
      "schedule.day2_title": "A Day to Tune Body and Mind with Learning and Yoga",
      "schedule.day2_text": "After breakfast, learn about health and enjoy free time. Gently tune body and mind through lunch, yoga, and a hot spring.",
      "schedule.day3_title": "A Day to Tune Body and Mind with Exercise and Warmth",
      "schedule.day3_text": "Exercise at the Health Training Hall to suit your fitness. After lunch, relax during free time while enjoying the heated kilns and hot springs.",
      "schedule.day4_title": "A Day Touring the Sights of Aso",
      "schedule.day4_text": "After breakfast, visit sightseeing spots around Aso such as Kikuchi Gorge and Daikanbo, then soothe your travel fatigue with a hot spring and dinner.",
      "schedule.day5_title": "A Day for Couples to Spend Freely",
      "schedule.day5_text": "The early morning begins with free time. After breakfast, enjoy a dome reduction bath, sightseeing, and lunch, then spend a calm evening with a hot spring and dinner.",
      "schedule.day6_title": "A Day to Confirm the Change and Close the Journey",
      "schedule.day6_text": "After breakfast, check out and take your final measurements. Look back on your stay at the health campus, and enjoy free time right up until departure.",
      "schedule.cta": "View schedule details",

      /* ---- Schedule detail modal (5泊6日) ---- */
      "smodal.title": 'Health Program <span>(5 Nights, 6 Days)</span><br />Detailed Schedule',
      "smodal.note": "*Please zoom in to view the details",
      "smodal.checkin": "Check-in",
      "smodal.pavilion_measure": 'Health Pavilion<br />(Measurements)',
      "smodal.fitness_age": "Fitness Age Test",
      "smodal.onsen": "Hot Spring",
      "smodal.dinner": "Dinner",
      "smodal.sleep": "Sleep",
      "smodal.breakfast": "Breakfast",
      "smodal.campus": 'Health<br />Campus',
      "smodal.freetime_walk": 'Free Time<br />(Walks, etc.)',
      "smodal.lunch_buffet": 'Lunch<br />Buffet',
      "smodal.yoga": "Yoga",
      "smodal.training": 'Health<br />Training Hall',
      "smodal.thermal": 'Thermal Building<br />(13 Types)',
      "smodal.freetime": "Free Time",
      "smodal.day_tour": "Full-Day Tour",
      "smodal.spot_daikanbo": "・Daikanbo",
      "smodal.spot_shirakawa": "・Shirakawa Springs",
      "smodal.spot_myojin": "・Myojin Pond Spring Park",
      "smodal.spot_kikuchi": "・Kikuchi Gorge",
      "smodal.couple_walk": "Couple's Morning Walk",
      "smodal.dome_bath": "Dome Reduction Bath",
      "smodal.kinokotei_lunch": "Lunch at Kinoko-tei",
      "smodal.local_tour": "Local Sightseeing",
      "smodal.local_tour_sub": 'Kamishikimi<br />Kumanoimasu Shrine',
      "smodal.checkout": "Check-out",
      "smodal.pavilion_final": 'Health Pavilion<br />(Final Measurements)',
      "smodal.campus_review": 'Health Campus<br />(Stay Review)',
      "smodal.freetime_departure": 'Free Time<br />& Departure',

      /* ---- Access ---- */
      "access.title": "Access",
      "access.intro": "Though set in a special location embraced by the majestic nature of Aso,<br />it is also conveniently reachable from major airports and stations.",
      "access.location_title": "Location",
      "access.transit_title": "Getting Here from Major Transit Hubs",
      "access.airport_title": "For Guests Arriving by Air",
      "access.airport_desc1": "About 30 minutes by car from Kumamoto Airport",
      "access.airport_desc2": "About 135 minutes by car from Fukuoka Airport",
      "access.train_title": "For Guests Arriving by Train",
      "access.train_desc1": "About 20 minutes by taxi from JR Aso Station",
      "access.train_desc2": "About 7 minutes by taxi from JR Akamizu Station",
      "access.car_title": "For Guests Arriving by Car",
      "access.car_desc1": "About 60 minutes by car from central Kumamoto",
      "access.car_desc2": "Accessible via the expressway from the Fukuoka area",
      "access.address": "5579-3 Kawayo, Minamiaso-mura, Aso-gun, Kumamoto",
      "access.btn_map": "View on Google Maps",
      "access.btn_route": "View Route",

      /* ---- FAQ ---- */
      "faq.title": "Frequently Asked Questions",
      "faq.q1": "What is the minimum number of nights to take part?",
      "faq.a1": "We recommend a stay of at least 5 nights / 6 days. Rather than a short stay, we offer a deeper health experience by tuning your lifestyle through diet, exercise, warmth, and sleep.",
      "faq.q2": "Can we take part together as a couple?",
      "faq.a2": "Yes. We highly recommend taking part as a couple. While reviewing each other’s health, you can also make it valuable time for living the years ahead more richly.",
      "faq.q3": "Is this a facility for medical procedures or treatment?",
      "faq.a3": "This program is not a medical facility for treating illness. It is a stay-type health-promotion program aimed at preventive medicine, wellness, and improving lifestyle habits.",
      "faq.q4": "Can I take part even if I’m not good at exercise?",
      "faq.a4": "Of course. We have programs you can take on comfortably, matched to your age and fitness. Based on your health measurements, you can participate at a pace that suits you.",
      "faq.q5": "Can you accommodate dietary restrictions or allergies?",
      "faq.a5": "We accommodate as much as possible. Please let us know in advance at the time of booking about allergies, dietary restrictions, vegetarian needs, and the like.",
      "faq.q6": "Is English-language support available?",
      "faq.a6": "We are progressively expanding English-language support so that overseas guests can stay with peace of mind. If you contact us in advance, we will do our best to assist you.",
      "faq.q7": "What is included in the price?",
      "faq.a7": 'The price includes accommodation, the specified meals, and use of the health facilities. For details, please see the <a href="#pricing" class="faq__link">plan contents</a>.',
      "faq.q8": "Is a concierge service available?",
      "faq.a8": "Yes. We offer a concierge service to make your stay even more comfortable. If you wish to use it, please select the concierge add-on on the booking page.",
      "faq.q9": "Can I consult with you before my stay?",
      "faq.a9": 'Yes. We accept advance consultations regarding any concerns, your health, the purpose of your stay, and more. <a href="#contact" class="faq__link faq__link--underline">Inquiries here</a>',

      /* ---- Footer ---- */
      "footer.cta_title": 'Review your lifestyle at the stage before illness sets in.<br /><span class="footer__cta-highlight">True health-building starts right here.</span>',
      "footer.reserve": "Book Now",
      "footer.contact": "Inquiries &amp; Consultations Here",
      "footer.hours": "Open year-round / Booking hours 9:00–17:00",
      "footer.nav_program": "What Is the Stay-Type Health-Promotion Program",
      "footer.nav_supervision": "Fully Supervised by the Japan Health Promotion Academic Organization",
      "footer.nav_fields": "The Six Fields That Make Up the Program",
      "footer.nav_wishes": "Our Wishes for Your Family",
      "footer.nav_pricing": "Plans &amp; Pricing",
      "footer.nav_access": "Access",
      "footer.nav_faq": "FAQ",
      "footer.nav_contact": "Inquiries &amp; Consultations",
      "footer.nav_privacy": "Privacy Policy",
      "footer.address": "〒869-1404 5579-3 Kawayo, Minamiaso-mura, Aso-gun, Kumamoto",

      /* ---- Modal: Field 1 (Learn) ---- */
      "modal.field1.title": "Learn Together as a Couple,<br>and Understand Your Own Body",
      "modal.field1.p1": "Building health begins with first knowing your own body.<br>Under the supervision of the Japan Health Promotion Academic Organization, you’ll learn — through easy-to-follow, theme-based curricula — content that benefits your life ahead, such as diet, exercise, mental care, and caring for cognitive function.",
      "modal.field1.p2": "In addition, various measurements let you confirm your current physical condition and the points to watch going forward. Knowing each other’s state as a couple becomes the spark to review your lifestyle habits together.",
      "modal.field1.habits_subtitle": "Learned at the Health Campus",
      "modal.field1.habits_title": 'Four <span class="text-gold">Healthy Habits</span>',
      "modal.field1.card1_title": "Diet",
      "modal.field1.card1_desc": "Review the balance of your daily meals and learn eating habits you can easily keep up.",
      "modal.field1.card2_title": "Exercise",
      "modal.field1.card2_desc": "Build a daily exercise habit matched to your own fitness.",
      "modal.field1.card3_title": "Mental Health",
      "modal.field1.card3_desc": "Learn how to face stress and the self-care for protecting your mental health.",
      "modal.field1.card4_title": "Dementia Prevention",
      "modal.field1.card4_desc": "Learn, in an easy-to-follow way, the habit of using your brain and measures to maintain cognitive function.",

      /* ---- Modal: Field 2 (Measure) ---- */
      "modal.field2.title": "A Health Self-Check with<br>15 of the Latest Devices",
      "modal.field2.p1": "The measurements consist of eight basic measurements (self-service) and seven measurements performed by staff or qualified nurses.",
      "modal.field2.p2": "Each measurement takes about 3–5 minutes at most, places little strain on the body, and involves no pain.",
      "modal.field2.p3": "So that you can take the measurements in a relaxed state, please come in comfortable, non-restrictive clothing.",
      "modal.field2.p4": "Staff will be by your side throughout to support you, so you can be measured with peace of mind.",
      "modal.field2.supervisor_text": "The [Health Pavilion] is<br>a health facility built under the<br>supervision of the Japan Health<br>Promotion Academic Organization.<br>Its primary purpose is not to detect illness,<br>but to help you understand your own body.",
      "modal.field2.supervisor_title": "Chairman, Japan Health Promotion Academic Organization<br>Director, Preventive Medicine Balance Research Institute<br>Director, Preventive Medicine General Hospital<br>M.D., Ph.D., Psychiatrist",
      "modal.field2.card1_title": "Body Composition Analysis",
      "modal.field2.card1_desc": "Measures muscle, body fat, and water balance",
      "modal.field2.card2_title": "Vascular Age",
      "modal.field2.card2_desc": "Assesses the stiffness and blockage of blood vessels",
      "modal.field2.card3_title": "Brain Age",
      "modal.field2.card3_desc": "Checks cognitive function from multiple angles",
      "modal.field2.card4_title": "Bone Density",
      "modal.field2.card4_desc": "Measures bone strength to prevent osteoporosis",
      "modal.field2.visible_title": 'Make your body’s health state — body composition,<br>vascular condition, brain age, and more — <span class="text-gold">visible</span>',
      "modal.field2.visible_p1": "By making your health state visible, you grasp your own condition, and the points that need improvement come into clear view.",
      "modal.field2.visible_p2": "“What is in good shape” and “what has declined.”",
      "modal.field2.visible_p3": "We hope you’ll use the results here to review your diet, exercise, and lifestyle, and carry them through to everyday improvements.",

      /* ---- Modal: Field 3 (Move) ---- */
      "modal.field3.title": "Effective Exercise<br>Tailored to Your Own Fitness",
      "modal.field3.p1": "The “Health Training Hall” is where you can experience firsthand the “movement” you learned at the health campus.<br>It is an all-weather exercise-attraction facility supervised by the Japan Health Promotion Academic Organization.",
      "modal.field3.p2": "Across 17 attractions, you actually move your body and experience “movement” matched to your condition and fitness.",
      "modal.field3.p3": "By moving your body, you are freed from everyday stress and lack of exercise.<br>What’s more, so you can easily fit it into your daily health habits back home, reference exercise times and calories burned are clearly posted at a glance.",
      "modal.field3.exercise_title": 'Each device shows its <span class="text-gold">exercise effect</span> and<br class="u-pc">the <span class="text-gold">main muscles</span> it uses',
      "modal.field3.exercise_subtitle": "Example: the Dynamo Spin",
      "modal.field3.exercise_text": "Exercise points, prohibitions, the main muscles used, and a radar chart of the exercise effect are written in both Japanese and English, all presented beside each device.",
      "modal.field3.trainer_title": "Member, Japan Health Promotion Academic Organization<br>Lecturer, Kyungsung University of Physical Education<br>(Sports Humanities &amp; Applied Sociology)<br>Ph.D. in Physical Education and Sports<br>Health Exercise Instructor",

      /* ---- Modal: Field 5 (Heal) ---- */
      "modal.field5.title": "A Sense of Liberation from the Sweeping Scenery and<br>Bathing That Heals Body and Mind, Embraced by Great Nature",
      "modal.field5.card1_title": "Aso Health Volcano Hot Spring",
      "modal.field5.card1_desc": "A sulfate hot spring rich in natural triple minerals.<br>In the open-air bath of a natural stone garden, soothe your everyday fatigue and promote recovery and stress relief.",
      "modal.field5.card2_title": "13 Kinds of Health Heating Kilns",
      "modal.field5.card2_desc": "One of Japan’s largest health bathing facilities, with 13 kinds of dome kilns where you can feel the benefits of herbs and minerals.<br>In the healing warmth, spend time finding rest, relaxing, and tuning body and mind.",
      "modal.field5.card3_title": "Petting Animal Kingdom",
      "modal.field5.card3_subtitle": "Animal-Therapy Facility",
      "modal.field5.card3_desc": "An animal-therapy facility here at the foot of great natural Aso, where interacting with freely living animals lets you feel the majesty of nature and the preciousness of life, calming the mind and relaxing the whole body.<br>You can spend a time in which your heart is healed and, mysteriously, vitality wells up.",

      /* ---- Modal: Field 4 (Eat) ---- */
      "modal.field4.title": "Aso Health Cuisine That Cares for the Body",
      "modal.field4.card1_badge": "Rich in Medicinal Properties",
      "modal.field4.card1_title": "“Medicinal Cuisine” Harnessing the Power of Mushrooms",
      "modal.field4.card2_badge": "Made with Pesticide-Free, Home-Grown Vegetables",
      "modal.field4.card2_title": "A Healthy Menu Devised by the<br>Organization’s Registered Dietitians",
      "modal.field4.supervisor_heading": "“To Live Is to Eat”",
      "modal.field4.supervisor_p1": "After serving at Osaka University Hospital, Faculty of Medicine,<br>she devoted about 60 years to clinical practice, therapeutic diets, and education.",
      "modal.field4.supervisor_p2": "With the concept of “preventing illness before it arises and building a strong body and healthy mind,”<br>she continues to explore the importance of boosting immunity.",
      "modal.field4.supervisor_title": "Member, Japan Health Promotion Academic Organization<br>Clinical Registered Dietitian<br>Graduate of Osaka Health Women’s University",

      /* ---- Modal: Field 6 (Stay) ---- */
      "modal.field6.title": "A Womb-Like Space to Experience<br>Drawing Out Rest and Comfort, Toward Quality Sleep",
      "modal.field6.subtitle": 'Feel the <span class="text-gold">forest-therapy effect</span> at lodging within the forest',
      "modal.field6.p1": "The forest is said to have the power to gently tune people’s minds and bodies.",
      "modal.field6.p2": "Gazing at the green of the trees. Breathing in the scent of the forest deeply.<br>Touching the bark, and listening quietly to the chirping of birds and the murmur of streams.",
      "modal.field6.p3": "Time spent feeling nature through the five senses eases everyday tension<br>and guides body and mind into a relaxed state.",
      "modal.field6.p4": "Scents derived from the forest and stimulation from the natural environment promote physiological relaxation,<br>and are believed to help maintain and enhance immune function.",
      "modal.field6.p5": "Resting deeply in nature<br>is also drawing attention from the perspective of “preventive medicine,” which heads off illness before it arises.",
      "modal.field6.profile_title": "Director, Japan Health Promotion Academic Organization<br>Graduate School of Agriculture, Kyushu University<br>Forest Environmental Resources Science<br>Associate Professor, Ph.D. in Agriculture",
      "modal.field6.detail_tag": "Oaso Shizen Kenko no Mori",
      "modal.field6.detail_title": "Private Royal Zone",
      "modal.field6.detail_p1": "All 74 guest rooms come with their own door and garden.<br>Generously laid out “detached” rooms are also close to the front desk, offering a higher level of rest with walking in mind.",
      "modal.field6.detail_p2": "The rounded, dome-shaped rooms in white tones make you feel as if you’ve set foot somewhere in a foreign land.<br>Amid the blessings nurtured by great nature, you can feel the extraordinary.",

      /* ---- Modal: Privacy ---- */
      "modal.privacy.title": "- Privacy Policy -",
      "modal.privacy.intro": "Aso Farm Land Co., Ltd. (hereinafter “the Company”) recognizes that protecting personal information is not only a social responsibility but also an essential requirement for earning society’s trust and advancing its business activities. The Company gives full consideration to the proper management and use of customers’ personal information and undertakes the following measures.",
      "modal.privacy.item1_title": '<span class="privacy-modal__item-icon"></span>Management of Personal Information',
      "modal.privacy.item1_text": "The Company gives full consideration to the proper management and use of customers’ personal information and undertakes the following measures.",
      "modal.privacy.item2_title": '<span class="privacy-modal__item-icon"></span>Purpose of Use and Scope of Collection',
      "modal.privacy.item2_text": "When the Company asks customers to provide personal information such as name, address, telephone number, and email address, it informs them in advance of the purpose of use and the point of contact for inquiries, and collects customers’ personal information within an appropriate scope.",
      "modal.privacy.item3_title": '<span class="privacy-modal__item-icon"></span>Use of Personal Information',
      "modal.privacy.item3_text": "When collecting personal information from customers, the Company clearly states its purpose and uses it for the purposes listed below.<br />To respond to customer inquiries.<br />・To accept product orders and make related contact.<br />・To deliver products and make related contact.<br />・To provide maintenance services.<br />・To send direct mail and emails introducing products or services.<br />・For statistical surveys for the Company group’s marketing, service improvement, and product development.<br />・To convey notices such as various campaigns to customers.<br />・For registration of membership services such as point cards.",
      "modal.privacy.item4_title": '<span class="privacy-modal__item-icon"></span>Prohibition of Provision to / Disclosure to Third Parties',
      "modal.privacy.item4_text": "Except where the customer’s consent has been obtained, or where there is a legitimate reason such as disclosure being required under laws and regulations, the Company does not provide or disclose customers’ personal information to third parties.",
      "modal.privacy.item5_title": '<span class="privacy-modal__item-icon"></span>Supervision of Contractors',
      "modal.privacy.item5_text": "To achieve the purpose of use consented to by the customer, when the Company discloses customers’ personal information to a contractor, it provides appropriate supervision — for example, by contractually obligating the contractor to manage personal information as strictly as the Company itself and ensuring this is carried out.",
      "modal.privacy.item6_title": '<span class="privacy-modal__item-icon"></span>Ensuring and Improving Information Security',
      "modal.privacy.item6_text": "To prevent leakage, loss, or alteration of customers’ personal information, the Company continually works to ensure and improve information security.",
      "modal.privacy.item7_title": '<span class="privacy-modal__item-icon"></span>Education and Awareness',
      "modal.privacy.item7_text": "The Company provides education and awareness to all directors, officers, and employees so that they understand the importance of protecting personal information and handle customers’ personal information appropriately.",
      "modal.privacy.item8_title": '<span class="privacy-modal__item-icon"></span>Responding to Disclosure, Correction, and the Like of Personal Information',
      "modal.privacy.item8_text": "Except in any of the following cases, the Company does not provide or disclose to third parties the personal information collected from customers.<br />・When disclosure is required under laws and regulations.<br />・When the Company judges it appropriate for the content to be answered directly by an affiliated company in response to a customer inquiry.<br />・When providing or jointly using it with the Company’s affiliated companies after taking appropriate protective measures.<br />・When the customer’s prior consent has been obtained.<br />・When necessary to prevent serious harm to the life, health, or property of the customer or the general public.<br />・When a public institution makes a disclosure request based on authority granted by law.<br />When a customer wishes to have their own personal information disclosed or corrected, the Company responds within a reasonable period and scope after confirming that the applicant is the person in question.",
      "modal.privacy.item9_title": '<span class="privacy-modal__item-icon"></span>Ongoing Review and Improvement',
      "modal.privacy.item9_text": "While complying with laws, regulations, and other norms related to the protection of personal information, the Company continually reviews and improves its personal-information-protection efforts in response to changes in the social environment."
    }
  };

  /* ---------------------------------------------------------
     Implementation
     --------------------------------------------------------- */
  function onReady(fn) {
    if (document.readyState !== "loading") fn();
    else document.addEventListener("DOMContentLoaded", fn);
  }

  function isAllowed(lang) {
    return ALLOWED.indexOf(lang) !== -1;
  }

  /* Attribute-translation map: data-* directive -> real attribute.
     Lets placeholders / aria-labels be localized, since the dict
     values are plain text written into the attribute (not innerHTML). */
  var ATTR_MAP = {
    "data-i18n-placeholder": "placeholder",
    "data-i18n-aria-label": "aria-label"
  };

  onReady(function () {
    var nodes = Array.prototype.slice.call(document.querySelectorAll("[data-i18n]"));

    /* Cache the original (Japanese) innerHTML as the fallback. */
    var fallback = {};
    nodes.forEach(function (el) {
      var key = el.getAttribute("data-i18n");
      if (key && !(key in fallback)) {
        fallback[key] = el.innerHTML;
      }
    });

    /* Collect attribute-translated nodes and cache their JA originals. */
    var attrSelector = Object.keys(ATTR_MAP).map(function (d) {
      return "[" + d + "]";
    }).join(",");
    var attrNodes = Array.prototype.slice.call(
      document.querySelectorAll(attrSelector)
    );
    var attrFallback = {};
    attrNodes.forEach(function (el) {
      Object.keys(ATTR_MAP).forEach(function (directive) {
        var key = el.getAttribute(directive);
        if (key && !(key in attrFallback)) {
          attrFallback[key] = el.getAttribute(ATTR_MAP[directive]) || "";
        }
      });
    });

    function setMeta(lang) {
      var meta = META[lang] || META[DEFAULT_LANG];
      if (!meta) return;
      if (meta.title) document.title = meta.title;

      var descTag = document.querySelector('meta[name="description"]');
      if (descTag && meta.desc) descTag.setAttribute("content", meta.desc);

      var ogTitle = document.querySelector('meta[property="og:title"]');
      if (ogTitle && meta.title) ogTitle.setAttribute("content", meta.title);

      var ogDesc = document.querySelector('meta[property="og:description"]');
      if (ogDesc && meta.desc) ogDesc.setAttribute("content", meta.desc);
    }

    function updateSwitcher(lang) {
      /* Toggle label text. */
      var labels = document.querySelectorAll(".lang__label");
      Array.prototype.forEach.call(labels, function (lbl) {
        lbl.textContent = TOGGLE_LABEL[lang] || TOGGLE_LABEL[DEFAULT_LANG];
      });

      /* Active item state. */
      var items = document.querySelectorAll(".lang__item");
      Array.prototype.forEach.call(items, function (item) {
        var code = item.getAttribute("data-lang-code");
        if (code && code === lang) item.classList.add("is-active");
        else item.classList.remove("is-active");
      });
    }

    function updateUrl(lang) {
      if (!window.history || !window.history.replaceState) return;
      try {
        var url = new URL(window.location.href);
        url.searchParams.set("lang", lang);
        window.history.replaceState(null, "", url.toString());
      } catch (e) {
        /* URL API unavailable (e.g. very old browser) — skip silently. */
      }
    }

    function applyLocale(lang) {
      if (!isAllowed(lang)) lang = DEFAULT_LANG;

      var dict = I18N[lang]; /* undefined for 'ja' */
      nodes.forEach(function (el) {
        var key = el.getAttribute("data-i18n");
        if (!key) return;
        if (lang === DEFAULT_LANG) {
          el.innerHTML = fallback[key];
        } else if (dict && Object.prototype.hasOwnProperty.call(dict, key)) {
          el.innerHTML = dict[key];
        } else {
          el.innerHTML = fallback[key]; /* graceful fallback to JA */
        }
      });

      /* Translated attributes (placeholder / aria-label). */
      attrNodes.forEach(function (el) {
        Object.keys(ATTR_MAP).forEach(function (directive) {
          var key = el.getAttribute(directive);
          if (!key) return;
          var attr = ATTR_MAP[directive];
          if (lang === DEFAULT_LANG) {
            el.setAttribute(attr, attrFallback[key]);
          } else if (dict && Object.prototype.hasOwnProperty.call(dict, key)) {
            el.setAttribute(attr, dict[key]);
          } else {
            el.setAttribute(attr, attrFallback[key]);
          }
        });
      });

      document.documentElement.lang = HTML_LANG[lang] || HTML_LANG[DEFAULT_LANG];
      setMeta(lang);
      updateSwitcher(lang);

      try {
        localStorage.setItem("lang", lang);
      } catch (e) {
        /* storage may be blocked — ignore. */
      }
      updateUrl(lang);
    }

    /* ---- Determine initial locale ---- */
    function detectLocale() {
      var stored = null;
      try {
        stored = localStorage.getItem("lang");
      } catch (e) {
        stored = null;
      }
      if (stored && isAllowed(stored)) return stored;

      try {
        var qp = new URL(window.location.href).searchParams.get("lang");
        if (qp && isAllowed(qp)) return qp;
      } catch (e) {
        /* ignore */
      }
      return DEFAULT_LANG;
    }

    /* ---- Wire up language items ---- */
    var langItems = document.querySelectorAll(".lang__item[data-lang-code]");
    Array.prototype.forEach.call(langItems, function (item) {
      item.addEventListener("click", function () {
        var code = item.getAttribute("data-lang-code");
        if (!isAllowed(code)) return;
        applyLocale(code);

        /* Close the dropdown (nav.js owns open/close, but we close
           on selection to mirror expected behavior). */
        var langWrap = item.closest("[data-lang]");
        if (langWrap) {
          var menu = langWrap.querySelector(".lang__menu");
          var toggle = langWrap.querySelector(".lang__toggle");
          if (menu) menu.hidden = true;
          if (toggle) toggle.setAttribute("aria-expanded", "false");
        }
      });
    });

    /* ---- Apply initial locale ---- */
    applyLocale(detectLocale());
  });
})();

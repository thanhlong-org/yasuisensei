# ASO Nature

Website tĩnh (HTML/CSS/JS) cho thương hiệu **ASO Nature**. Triển khai được trên
GitHub Pages và thiết kế sẵn sàng để chuyển sang WordPress trong tương lai.

## Cấu trúc thư mục

```
aso-nature/
├── index.html              # Trang chủ
├── .nojekyll               # Tắt xử lý Jekyll của GitHub Pages
├── .gitignore
├── README.md
├── assets/
│   ├── css/
│   │   ├── reset.css       # Reset CSS cơ bản
│   │   └── style.css       # Style chính + biến màu (design tokens)
│   ├── js/
│   │   ├── include.js      # Tải header/footer dùng chung
│   │   └── main.js         # JS chính
│   ├── img/                # Hình ảnh
│   └── fonts/              # Font tùy chỉnh
├── pages/
│   ├── about.html          # Giới thiệu
│   ├── products.html       # Sản phẩm
│   └── contact.html        # Liên hệ
└── partials/
    ├── header.html         # Header dùng chung (≈ header.php WordPress)
    └── footer.html         # Footer dùng chung (≈ footer.php WordPress)
```

## Chạy thử cục bộ

Vì dùng `fetch()` để nạp header/footer, cần chạy qua web server (không mở trực
tiếp file qua `file://`):

```bash
# Python
python -m http.server 8000

# Hoặc Node
npx serve
```

Mở http://localhost:8000

## Triển khai GitHub Pages

1. Đẩy code lên GitHub: `git init && git add . && git commit -m "init" && git push`
2. Vào **Settings → Pages**, chọn nhánh `main`, thư mục `/ (root)`.
3. File `.nojekyll` đảm bảo các thư mục như `assets/` được phục vụ đúng.

## Hướng chuyển sang WordPress

Cấu trúc đã tách sẵn để dễ chuyển đổi:

| File tĩnh hiện tại      | Tương đương WordPress         |
| ----------------------- | ----------------------------- |
| `partials/header.html`  | `header.php`                  |
| `partials/footer.html`  | `footer.php`                  |
| `index.html`            | `front-page.php` / `index.php`|
| `pages/*.html`          | `page-*.php` hoặc Page editor  |
| `assets/css/style.css`  | `style.css` của theme          |
| `assets/js/`, `img/`    | giữ trong thư mục theme        |

Khi chuyển: thay phần `data-include` bằng `<?php get_header(); ?>` /
`<?php get_footer(); ?>`, và nạp CSS/JS qua `wp_enqueue_*`.

# Project rules

## Cache busting JS/CSS

Mỗi lần sửa file JS hoặc CSS của theme (`wp-content/themes/ludoa/static/**`, hoặc bất kỳ asset nào được enqueue), PHẢI bump version ở chỗ include để xóa cache trình duyệt:

- Toàn bộ `wp_enqueue_style` / `wp_enqueue_script` của theme dùng constant `LUDOA_VERSION` trong `wp-content/themes/ludoa/functions.php` — tăng patch version (ví dụ `1.0.0` → `1.0.1`) trong cùng commit với thay đổi JS/CSS.
- Nếu thêm enqueue mới, luôn truyền `LUDOA_VERSION` làm tham số version, không hardcode hoặc để `null`/`false`.

---
description: Tạo repo GitHub mới trong org chỉ định bằng gh CLI
argument-hint: <org> <repo-name> [public]
allowed-tools: Bash(gh repo create:*), Bash(gh auth status:*), Bash(gh api:*)
---

Tạo một repo GitHub mới trong org được chỉ định, dùng `gh` CLI (auth sẵn có, KHÔNG hỏi token).

Tham số người dùng: `$ARGUMENTS`
- Tham số 1 = tên org (bắt buộc)
- Tham số 2 = tên repo (bắt buộc)
- Tham số 3 = `public` → tạo public; nếu thiếu → mặc định **private**

Các bước:
1. Nếu thiếu org hoặc repo name → dừng, hỏi lại người dùng, đừng đoán.
2. Kiểm tra đăng nhập: chạy `gh auth status`. Nếu chưa login → báo người dùng chạy `gh auth login` (đừng yêu cầu paste token vào chat).
3. Tạo repo:
   - private: `gh repo create <org>/<repo> --private`
   - public:  `gh repo create <org>/<repo> --public`
4. Nếu gh báo lỗi quyền (permission / 403) → giải thích account hiện tại không có quyền tạo repo trong org đó, gợi ý kiểm tra membership / scope token (`repo`, `admin:org`).
5. Khi xong → in link `https://github.com/<org>/<repo>`.

Bảo mật: không bao giờ yêu cầu hoặc in token. Token (nếu cần account khác) phải set qua env `GH_TOKEN` ở terminal của người dùng, không qua chat.

 
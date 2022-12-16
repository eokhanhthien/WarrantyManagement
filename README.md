# Bước 1:
    + Tải code về thư mục httdoc của Xampp
# Bước 2
    + Cài composer sau đó mở thư mục code ở trên chạy lệnh " composer i " để cài các gói
# Bước 3
    + Trong thư mục code vừa tải về cáo file sql " web_warrantymanagement.sql " 
    hãy import lên CSDL MySQL ( VD CSDL tên là "warrantymanagement" )
# Bước 4
    + Sau đó tạo file ".env" và copy ".env.example" vào đó 
    --> Sửa lại dòng DB_DATABASE = warrantymanagement ( Tên CSDL vừa tạo ở trên )
# Bước 5     
    + Vào http://127.0.0.1:8000/ để xem kết quả, 
    nếu bị lỗi vui lòng mở terminal và chạy lệnh " php artisan key:generate "

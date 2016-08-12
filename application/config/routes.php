<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'welcome';
$route['san-pham']='San_pham/DSSachSanPham';
$route['khach-hang/them-mat-hang']='Khach_hang/ThemMatHang';
$route['khach-hang/thong-tin-gio-hang']='Khach_hang/ThongTinGioHang';
$route['khach-hang/dat-hang']='Khach_hang/DatHang';
$route['khach-hang/thong-tin-don-dat-hang/([0-9]+)']='Khach_hang/ThongTinDonDatHang';
$route['san-pham/chitietsanpham/([a-z0-9-_]+)']='San_pham/ChiTietSanPham';
$route['san-pham/([0-9])']='San_pham/DSSachSanPham';
$route['san-pham/([a-z-_]+)']='San_pham/SanPhamLoaiCha';
$route['san-pham/([a-z-_]+)/([a-z-_]+)']='San_pham/SanPhamLoaiCon';
$route['quan-tri/san-pham/them-san-pham']='San_pham/ThemSanPham';
$route['quan-tri/san-pham/danh-sach-san-pham']='San_pham/DanhSachSanphamAdmin';
$route['quan-tri/san-pham/danh-sach-san-pham/:num']='San_pham/DanhSachSanphamAdmin';
$route['quan-tri/san-pham/cap-nhat-san-pham/:num']='San_pham/CapNhatSanPham';
$route['quan-tri/san-pham/xoa-san-pham']='San_pham/XoaSanPham';
$route['quan-tri/nguoi-dung/dang-nhap']='Nguoi_dung/DangNhap';
$route['quan-tri/nguoi-dung/dang-xuat']='Nguoi_dung/DangXuat';
$route['quan-tri/he-thong']='Nguoi_dung/HeThong';
$route['tin-tuc/tin-tuc-moi']='Tin_tuc/TinTucMoi';
$route['tin-tuc/([a-z0-9-_]+)']='Tin_tuc/ChiTietTinTuc';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
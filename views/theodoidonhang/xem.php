SELECT hoadonban.MaHoaDon AS hoadonban,chitiethoadon.MaChiTietSP AS maCTSP, UserName,NgayLap,PhuongThucTT,GhiChu,TenSP,SoLuong,TongTienHD,hoadonban.trangthai as tt FROM hoadonban,chitiethoadon,danhmucsp,ban WHERE hoadonban.MaHoaDon=chitiethoadon.MaHoaDon AND chitiethoadon.MaChiTietSP = danhmucsp.MaSP AND UserName='thai'


UPDATE hoadonban,chitiethoadon,danhmucsp SET hoadonban.trangthai=1 WHERE hoadonban.MaHoaDon=chitiethoadon.MaHoaDon AND chitiethoadon.MaChiTietSP = danhmucsp.MaSP AND UserName='thai' AND hoadonban.MaHoaDon=77 AND chitiethoadon.MaChiTietSP=1

SELECT UserName,NgayLap,PhuongThucTT,GhiChu,TenSP,SoLuong,TongTienHD FROM hoadonban,chitiethoadon,danhmucsp,ban WHERE hoadonban.MaHoaDon=chitiethoadon.MaHoaDon AND chitiethoadon.MaChiTietSP = danhmucsp.MaSP AND UserName='thai'

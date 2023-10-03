# Jobdesc

Proses Register:
admin kantor verif & upload suarat pengantar -> 1 & 2
admin pembantu  verifikasi Form -> 2
user -> 3

Proses bisnis singkat:
Register->verif email->upload surat pengantar oleh(role: 1 & 2 dan tersimpan di file manager user 3)
-> Upload pengajuan(Include / Validasi surat pengantar)->Review(role 1 / 2)
-> Approval->notif to user 3

Form:
Layanan cuti v -
Layanan gaji berkala v -
Layanan tugas belajar v -
Layanan pensiun v -
Layanan mutasi v
-antar OPD  v -
Layanan jabatan fungsional v
=== Note halaman pertama pada

Table Utama Request:
- Header = Table Request (Status dan type form)
- relasi 1 = Detail berakhiran dengan "_form"
- relasi 2 = Attachment (Masih error)

Kondisi:
Jika sudah di lakukan action approval oleh role 1 & 2 maka user tidak bisa edit form pengajuan

ToDo :
- Register mailler Mythauth
- Notify mailler admin & admin pembantu
- management File -> get berdasarkan id user dan type file ?
- Fix ajax file manager upload -> file type (Tetap, Sementara)

Finish:
- templating
- Konsep Auth -> Permission dan grouping
- Full ajax processing (Ajax insert done) -> form cuti
- History list
- File manager list
- datatables serverside (Sudah) (User, History)Proses Register:
  admin kantor verif & upload suarat pengantar -> 1 & 2
  admin pembantu  verifikasi Form -> 2
  user -> 3

Proses bisnis singkat:
Register->verif email->upload surat pengantar oleh(role: 1 & 2 dan tersimpan di file manager user 3)
-> Upload pengajuan(Include / Validasi surat pengantar)->Review(role 1 / 2)
-> Approval->notif to user 3

Form:
- Layanan cuti v -
- Layanan gaji berkala v -
- Layanan tugas belajar v -
- Layanan pensiun v -
- Layanan mutasi v
antar OPD  v -
- Layanan jabatan fungsional v

Table Utama Request:
- Header = Table Request (Status dan type form)
- relasi 1 = Detail berakhiran dengan "_form"
- relasi 2 = Attachment (Masih error)

Kondisi:
Jika sudah di lakukan action approval oleh role 1 & 2 maka user tidak bisa edit form pengajuan

ToDo :
- Register mailler Mythauth
- Notify mailler admin & admin pembantu
- management File -> get berdasarkan id user dan type file ?
- Fix ajax file manager upload -> file type (Tetap, Sementara)

Finish:
- templating
- Konsep Auth -> Permission dan grouping
- Full ajax processing (Ajax insert done) -> form cuti
- History list
- File manager list
- datatables serverside (Sudah) (User, History)
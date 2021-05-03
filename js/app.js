//we can set animation delay as following in ms (default 1000)
ProgressBar.singleStepAnimation = 1500;
ProgressBar.init(
  ["Antrian", "Proses Pencucian", "Proses Penyabunan", "Proses Pengeringan", "Selesai"],
  "Proses Pengeringan",
  "progress-bar-wrapper" // created this optional parameter for container name (otherwise default container created)
);

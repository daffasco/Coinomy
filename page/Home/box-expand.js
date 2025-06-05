function tombolDropdown(id) {
  // Ambil semua dropdown-content lalu sembunyiin
  const dropdowns = document.querySelectorAll('.dropdown-content');
  dropdowns.forEach(element => {
    if (element.id !== id) element.style.display = 'none'; // berfungsi untuk menyembunyikan elementnya setiap loopingnya
  });

  // kalok ada toogle clicknya, kalo klik pas ngeblock/muncul bakal none, kalo klik pas none, bakal block
  const target = document.getElementById(id);
  if (target.style.display === 'block') {
    target.style.display = 'none';
  } else {
    target.style.display = 'block';
  }
}